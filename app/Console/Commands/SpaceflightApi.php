<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ArcticleController;


class SpaceflightApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:SpaceflightApi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualização automática do banco com novos artigos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = 0;
        $response = Http::get('http://api.spaceflightnewsapi.net/v3/articles')->json();
        $stored_arcticle = (object) ArcticleController::getArcticle();


            foreach($response as $article) 
            {
                $matches = 0;
                $article = (object) $article;
                if (count($stored_arcticle) == 0)
                {
                    ArcticleController::importArcticle($article);
                    $count ++;
                    break;
                }
                else{
                    foreach($stored_arcticle as $stored)
                    {
                        if ($article->id == $stored->id_api)
                        {
                            $matches ++;
                            continue;
                        }

                    }

                    if($matches == 0){
                        ArcticleController::importArcticle($article);
                        $count ++;
                        break;
                    }
                }
            }

    }
}