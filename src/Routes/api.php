<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/callback', 'IndexController@getCallback', true)->name('apiuser_callback');
Route::get('/login/{token}', 'IndexController@getLogin', true)->name('apiuser_login');
