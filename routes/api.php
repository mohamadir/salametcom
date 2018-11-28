<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return 'TEST';
});

// users
Route::post('/users', 'UserController@register');
Route::get('/users', 'UserController@getUsers');
Route::get('/users/search', 'UserController@search');

// transports
Route::post('/transports', 'TransportController@addTransport');
Route::get('/transports', 'TransportController@getTransports');

// helps
Route::post('/helps', 'TransportController@addHelp');
Route::get('/helps', 'TransportController@getHelps');
