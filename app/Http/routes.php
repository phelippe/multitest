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

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function () {
    $grantType = Authorizer:: getIssuer()->getRequest()->get('grant_type');
    $accessToken = Authorizer::issueAccessToken();

    DB::table('oauth_access_tokens')
        ->where('id', $accessToken['access_token'])
        ->update(['grant_type' => $grantType]);

    return Response::json($accessToken);
});

Route::group(['prefix' => 'api/cliente', 'middleware'=>'oauth.check.cliente', 'as' => 'api.'], function () {
    Route::get('test', function(){
        return Response::json(['oi']);
        //return Response::json(Authorizer::getResourceOwnerId());
    });
});

Route::group(['prefix' => 'api/motorista', 'middleware'=>'oauth.check.motorista', 'as' => 'api.'], function () {

    #Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('test', function(){
        return 'ok';
    });
});