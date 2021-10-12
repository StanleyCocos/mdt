<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// test
Route::group([
    'namespace' => 'App\Http\Controllers\Api',
], function(){
    Route::post('event',  [Controllers\Api\EventController::class,'store']);
    Route::post('history', [Controllers\Api\ApiHistoryController::class,'store']);
    Route::post('apple_news', [Controllers\Api\AppleNewsController::class,'store']);
    Route::post('test', [Controllers\Api\ApiHistoryController::class,'test']);
});
