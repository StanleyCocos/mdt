<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('index');
});

Route::get('test', function () {
    return "mdt test";
});


Route::group([
    'namespace' => 'App\Http\Controllers\Web',
], function (){
    Route::get('event/{imei?}', [Controllers\Web\EventController::class,'index'])->name('event.index');
    Route::get('clear/{imei?}', [Controllers\Web\EventController::class,'clear']);
    Route::get('error/{imei?}', [Controllers\Web\EventController::class,'error']);
    Route::get('apiList/{imei?}', [Controllers\Web\ApiHistoryController::class,'index']);
    Route::get('apiDetail/{id}', [Controllers\Web\ApiHistoryController::class,'detail']);
});
