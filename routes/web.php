<?php

use Illuminate\Support\Facades\Route;

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
    return "mdt test";
});


Route::group([
    'namespace' => 'App\Http\Controllers\Web',
], function (){
    Route::get('event/{imei?}', 'EventController@index')->name('event.index');
    Route::get('event/{imei}/clear', 'EventController@clear');
    Route::get('event/{imei}/error', 'EventController@error');
//    Route::get('event/{imei?}', 'EventController@index');
});
