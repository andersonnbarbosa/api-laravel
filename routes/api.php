<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArcticleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout');
    Route::post('refresh', 'refresh')->name('refresh');
    Route::post('login', 'login')->name('login');
});


Route::middleware(['apiJwt'])->group(function () {

    Route::get('/arcticles',[ArcticleController::class,'getArcticle'])->name('arcticles.all');

    Route::get('/arcticle/add',[ArcticleController::class,'add'])->name('arcticles.new');
    
    Route::get('/arcticle/{arcticle}', [ArcticleController::class,'getArcticleById'])->name('arcticles.byId');
    
    Route::get('/arcticle/edit/{arcticle}',[ArcticleController::class,'edit'])->name('arcticles.edit');
    
    Route::post('/arcticle/create',[ArcticleController::class, 'insertArcticle'])->name('arcticles.create');
    
    Route::put('/arcticle/update/{arcticle}',[ArcticleController::class, 'updateArcticle'])->name('arcticles.update');
    
    Route::delete('/arcticle/delete/{arcticle}', [ArcticleController::class, 'deleteArcticle'])->name('arcticles.delete');

});





