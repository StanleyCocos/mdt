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
    Route::get('clear/{imei?}', 'EventController@clear');
    Route::get('error/{imei?}', 'EventController@error');
    Route::get('apiList/{imei?}', 'ApiHistoryController@index');
    Route::get('apiDetail/{id}', 'ApiHistoryController@detail');
});
