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

Route::get('/user', function (Request $request) {
    return dd($request->user());
})->middleware('auth:api');

Route::group(
    ['prefix'=>'/v1/sms/', 'namespace'=>'Api\Sms'], function(){
    Route::post('send-single', 'ApiController@send_single');
});
//Route::get('/v1/sms/send-single');