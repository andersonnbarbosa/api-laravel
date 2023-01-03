<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Arcticle;
use App\Jobs\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;


class ArcticleController extends Controller
{
    
    /**
     * @OA\Get(
     *     path="/api/arcticles",
     *     summary="Get all arcticle in database",
     *     tags={"Arcticle"},
     *     @OA\Response(
     *         response="200",
     *         description="Return all arcticles stored"
     *     )
     * )
     */
    public static function getArcticle()
    {

       $arcticles = Arcticle::all();
       return $arcticles;
    }
    /**
     * @OA\Get(
     *     path="/api/arcticle/{id}",
     *     summary="Get arcticle by id",
     *     tags={"Arcticle"},
     *     @OA\Response(
     *         response="200",
     *         description="Arcticle corresponding to returned"
     *     )
     * )
     */
    public function getArcticleById(Arcticle $arcticle)
    {
        return $arcticle;
    }
    
    /**
     * @OA\Post(
     *     path="/api/arcticle/create",
     *     summary="Add a new arcticle in database",
     *     tags={"Arcticle"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="title",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="url",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="imageUrl",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="newsSite",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="summary",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */

    public function insertArcticle(Request $request)
    {
        $arcticle = new Arcticle();
        $arcticle-> id_api = 0;
        $arcticle-> title = $request->title;
        $arcticle-> url = $request->url;
        $arcticle-> imageUrl = $request->imageUrl;
        $arcticle-> newsSite = $request->newsSite;
        $arcticle-> summary = $request->summary;
        $arcticle-> publishedAt = date('Y-m-d H:i:s');
        $arcticle-> updatedAt = date('Y-m-d H:i:s');
        $arcticle-> featured = false;
        $arcticle-> save();

        $emails = UserController::getEmails();

        if (count($emails) > 0)
        {
           SendNewMail::dispatch($emails)->delay(now());
        }

        return http_response_code(201);
    }

     /**
     * @OA\Put(
     *     path="/api/arcticle/update/{id}",
     *     summary="Updates a arcticle in database",
     *     tags={"Arcticle"},
     *     @OA\Parameter(
     *         description="Id of arcticle to update",
     *         in="path",
     *         name="id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */

    public function updateArcticle(Arcticle $arcticle, Request $request)
    {
        $arcticle->title = $request->title;
        $arcticle-> title = $request->title;
        $arcticle-> url = $request->url;
        $arcticle-> imageUrl = $request->imageUrl;
        $arcticle-> newsSite = $request->newsSite;
        $arcticle-> summary = $request->summary;
        $arcticle-> updatedAt = date('Y-m-d H:i:s');
        $arcticle-> save();

        return http_response_code(200);
    }

    /**
     * @OA\Delete(
     *     path="/arcticle/delete/{id}",
     *     summary="Delete a arcticle in database by id",
     *     tags={"Arcticle"},
     *     @OA\Response(
     *         response="200",
     *         description="Return all arcticles stored"
     *     )
     * )
     */

    public function deleteArcticle(Arcticle $arcticle)
    {
        $arcticle->delete();
        return http_response_code(200);
    }

    public static function importArcticle($request)
    {
        $emails = UserController::getEmails();

        $arcticle = new Arcticle();
        $arcticle-> id_api = $request->id;
        $arcticle-> title = $request->title;
        $arcticle-> url = $request->url;
        $arcticle-> imageUrl = $request->imageUrl;
        $arcticle-> newsSite = $request->newsSite;
        $arcticle-> summary = $request->summary;
        $arcticle-> publishedAt = date('Y-m-d H:i:s');
        $arcticle-> updatedAt = date('Y-m-d H:i:s');
        $arcticle-> featured = $request->featured;
        $arcticle-> save();

        if (count($emails) > 0)
        {
            SendNewMail::dispatch($emails)->delay(now());
        }

    }

}
