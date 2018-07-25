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


Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function ()
{
    Route::resource('advisors', 'FAController');
});


Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function ()
{
    Route::resource('clients', 'ClientController');
});


Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function ()
{
    Route::resource('leads', 'LeadController');
});



Route::get('/ConfirmAccountMail', function () {

    $user = 'mukolwecms-326739@inbox.mailtrap.io';

    Mail::to($user)->send(new \App\Mail\ConfirmAccountMail($user));

    dd("Email is Send.");

});
