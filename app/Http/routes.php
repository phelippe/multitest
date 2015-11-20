<?php
Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function () {
    $grantType = Authorizer:: getIssuer()->getRequest()->get('grant_type');
    $accessToken = Authorizer::issueAccessToken();

    DB::table('oauth_access_tokens')
        ->where('id', $accessToken['access_token'])
        ->update(['grant_type' => $grantType]);

    #dd(Authorizer::getAccessToken());

    return Response::json($accessToken);
    #return Response::json(Authorizer::issueAccessToken());
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