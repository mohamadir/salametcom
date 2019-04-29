<?php

use Illuminate\Http\Request;
use App\Contact;
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

Route::get('/contacts', function (Request $request) {

    
    return Contact::get();

});
//contacts

Route::post('/upload/contacts', function (Request $request) {
    
    foreach ($request->data as $contact){
        $new =  new Contact();
       
        $new->email = $contact['email'] ? $contact['email'] : '';
        $new->phone = $contact['phone'] ? $contact['phone'] : '';
        $new->name = $contact['name'];
        $new->profession = '';
        $new->save();
    }

    return 'SUCCESS';

});

// users
Route::post('/users', 'UserController@register');
Route::get('/users', 'UserController@getUsers');
Route::get('/users/search', 'UserController@search');

// transports
Route::post('/transports', 'TransportController@addTransport');
Route::get('/transports', 'TransportController@getTransports');

// helps
Route::post('/helps', 'HelpController@addHelp');
Route::get('/helps', 'HelpController@getHelps');

// tools
Route::get('/tools', 'ToolController@getTools');
Route::get('/tools/between', 'ToolController@getToolsBetween');


// donates
Route::get('/donates', 'DonateController@getDonates');

