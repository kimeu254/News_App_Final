<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternationalNewsController;
use App\Http\Controllers\LifestyleController;
use App\Http\Controllers\NationalNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PoliticsController;
use App\Http\Controllers\SouthEasternNewsController;
use App\Http\Controllers\SportsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/news', [NewsController::class, 'index']);
Route::get('/allUsers', [NewsController::class, 'getUsers']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    
    Route::put('/user', [HomeController::class, 'updateProfile']);
    Route::put('/profilePic', [HomeController::class, 'updatePic']);

    Route::get('/southEasternNews', [SouthEasternNewsController::class, 'index']);
    Route::post('/southEasternNews', [SouthEasternNewsController::class, 'store']);
    Route::post('/southEasternNews/story', [SouthEasternNewsController::class, 'addDoubleStory']);
    Route::post('/southEasternNews/story/new', [SouthEasternNewsController::class, 'addTripleStory']);
    Route::put('/southEasternNews/{id}', [SouthEasternNewsController::class, 'update']);
    Route::delete('/southEasternNews/{id}', [SouthEasternNewsController::class, 'destroy']);

    Route::get('/nationalNews', [NationalNewsController::class, 'index']);
    Route::post('/nationalNews', [NationalNewsController::class, 'store']);
    Route::post('/nationalNews/story', [NationalNewsController::class, 'addDoubleStory']);
    Route::post('/nationalNews/story/new', [NationalNewsController::class, 'addTripleStory']);
    Route::put('/nationalNews/{id}', [NationalNewsController::class, 'update']);
    Route::delete('/nationalNews/{id}', [NationalNewsController::class, 'destroy']);

    Route::get('/internationalNews', [InternationalNewsController::class, 'index']);
    Route::post('/internationalNews', [InternationalNewsController::class, 'store']);
    Route::post('/internationalNews/story', [InternationalNewsController::class, 'addDoubleStory']);
    Route::post('/internationalNews/story/new', [InternationalNewsController::class, 'addTripleStory']);
    Route::put('/internationalNews/{id}', [InternationalNewsController::class, 'update']);
    Route::delete('/internationalNews/{id}', [InternationalNewsController::class, 'destroy']);

    Route::get('/businessCategory', [BusinessController::class, 'index']);
    Route::post('/businessCategory', [BusinessController::class, 'store']);
    Route::post('/businessCategory/story', [BusinessController::class, 'addDoubleStory']);
    Route::post('/businessCategory/story/new', [BusinessController::class, 'addTripleStory']);
    Route::put('/businessCategory/{id}', [BusinessController::class, 'update']);
    Route::delete('/businessCategory/{id}', [BusinessController::class, 'destroy']);

    Route::get('/lifestyleCategory', [LifestyleController::class, 'index']);
    Route::post('/lifestyleCategory', [LifestyleController::class, 'store']);
    Route::post('/lifestyleCategory/story', [LifestyleController::class, 'addDoubleStory']);
    Route::post('/lifestyleCategory/story/new', [LifestyleController::class, 'addTripleStory']);
    Route::put('/lifestyleCategory/{id}', [LifestyleController::class, 'update']);
    Route::delete('/lifestyleCategory/{id}', [LifestyleController::class, 'destroy']);

    Route::get('/sportsCategory', [SportsController::class, 'index']);
    Route::post('/sportsCategory', [SportsController::class, 'store']);
    Route::post('/sportsCategory/story', [SportsController::class, 'addDoubleStory']);
    Route::post('/sportsCategory/story/new', [SportsController::class, 'addTripleStory']);
    Route::put('/sportsCategory/{id}', [SportsController::class, 'update']);
    Route::delete('/sportsCategory/{id}', [SportsController::class, 'destroy']);

    Route::get('/politicsCategory', [PoliticsController::class, 'index']);
    Route::post('/politicsCategory', [PoliticsController::class, 'store']);
    Route::post('/politicsCategory/story', [PoliticsController::class, 'addDoubleStory']);
    Route::post('/politicsCategory/story/new', [PoliticsController::class, 'addTripleStory']);
    Route::put('/politicsCategory/{id}', [PoliticsController::class, 'update']);
    Route::delete('/politicsCategory/{id}', [PoliticsController::class, 'destroy']);
    
});
