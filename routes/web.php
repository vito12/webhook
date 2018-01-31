<?php

use App\WebHook;

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

    return WebHook::all();
    
});

Route::post('/web-hook', 'WebHookController@index');
Route::post('/web-hook/save', 'WebHookController@store');