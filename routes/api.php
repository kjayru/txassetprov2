<?php

use App\Http\Controllers\Api\PublicSiteController;
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

Route::prefix('v1')->group(function () {
    Route::get('/home', [PublicSiteController::class, 'home']);
    Route::get('/home/posts', [PublicSiteController::class, 'homePosts']);
    Route::get('/home/categories', [PublicSiteController::class, 'homeCategories']);
    Route::get('/services', [PublicSiteController::class, 'services']);
    Route::get('/industries', [PublicSiteController::class, 'industries']);
    Route::get('/industries/{categorySlug}', [PublicSiteController::class, 'industriesByCategory']);
    Route::get('/industries/{categorySlug}/{industrySlug}', [PublicSiteController::class, 'industryDetail']);
    Route::get('/training/events', [PublicSiteController::class, 'trainingEvents']);
    Route::get('/blog', [PublicSiteController::class, 'blog']);
    Route::get('/blog/{slug}', [PublicSiteController::class, 'blogDetail']);
    Route::post('/contact', [PublicSiteController::class, 'contact']);
    Route::post('/employment', [PublicSiteController::class, 'employment']);
    Route::post('/form8850', [PublicSiteController::class, 'form8850']);
    Route::get('/courses', [PublicSiteController::class, 'courses']);
    Route::get('/courses/{slug}', [PublicSiteController::class, 'courseDetail']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
