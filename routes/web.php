<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Contracts\MailService;
use App\Services\MailgunService;
use Illuminate\Support\Facades\Redis;
use Mailgun\Mailgun;

Route::get('/', function () {
//    //1.publish event
//    $data = [
//        'event' => 'UserSignedUp',
//        'data' =>  [
//            'username' => 'Shegun',
//        ],
//    ];
//
//    $data2 = [
//        'event' => 'ContactUploadStarted',
//        'msg' => 'Contact Upload has started',
//    ];
//
//    Redis::publish('test-channel', json_encode($data));
//    Redis::publish('notification-channel', json_encode($data));

    //2. Node.js + Redis subscribe to event

    //3. Use socket.io to emit to all clients.
    return view('welcome');
});

Route::get('test', function(\App\Contracts\EmailValidate $service){

    dd(auth()->user()->campaign()->where('id', 1)->get());

    $result = $service->validate('test@malibukokoko.com');
    dd($result);
});


Route::get('login/{id}', function($id){
    auth()->loginUsingId($id);
    return redirect()->route('ml_path');
});
Route::group(
    ['prefix'=>'campaign'], function() {
    Route::get('/', ['as'=>'cp_path', 'uses'=>'CampaignController@all']);
    Route::post('/', ['as'=>'post_new_path', 'uses'=>'CampaignController@postNew']);
});
Route::group(
    ['prefix' => 'mailing-list'], function () {
    Route::get('/', ['as' => 'ml_path', 'uses' => 'MailingListController@all']);
    Route::get('new', ['as' => 'new_ml_path', 'uses' => 'MailingListController@newList']);
    Route::post('new', ['as' => 'post_new_ml_path', 'uses' => 'MailingListController@postNew']);
    Route::get('{id}/view', ['as' => 'view_ml_path', 'uses' => 'MailingListController@view']);
    Route::post('{id}/upload-contacts', ['as' => 'upload_ml_path', 'uses' => 'MailingListController@upload']);
    Route::get('{id}/delete', ['as'=>'del_ml_path', 'uses'=>'MailingListController@delete']);
});