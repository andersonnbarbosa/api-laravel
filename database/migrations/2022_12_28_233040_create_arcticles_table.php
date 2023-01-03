<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arcticles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_api');
            $table->string('title', 1000);
            $table->string('url', 1000);
            $table->string('imageUrl', 1000);
            $table->string('newsSite', 1000);
            $table->longText('summary');
            $table->string('publishedAt', 50);
            $table->string('updatedAt', 50);
            $table->boolean('featured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arcticles');
    }
};
