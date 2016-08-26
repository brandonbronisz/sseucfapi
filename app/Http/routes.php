<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

/*
* SSEUCF-API Version 1.0
*/
$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
  $api->get('/', 'App\Api\V1\Controllers\PagesController@index');
});

/*
* Retreive Access Token
*/
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
