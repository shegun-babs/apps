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
use App\Contracts\EmailValidate;
use App\Contracts\MailService;
use App\Services\MailgunService;
use Illuminate\Support\Facades\Redis;
use infobip\api\client\SendSingleTextualSms;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\sms\mt\send\textual\SMSTextualRequest;
use Mailgun\Mailgun;
Auth::routes();
Route::get('/', function () {

//    return view('emails.marketing.jabisod.test');
//    return \Carbon\Carbon::now();
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

Route::get('/home', 'HomeController@index');
Route::group(
    ['prefix' => 'u'], function () {
    Route::get('{list_id}/{email}', 'UnsubscribeController@unsub')->name('unsub_path');
});

Route::group(
    ['prefix' => 'campaigns'], function () {
    Route::get('/', 'CampaignController@all')->name('cp_path');
    Route::post('/', 'CampaignController@postNew')->name('post_new_path');
    Route::get('{id}/view', 'CampaignController@view')->name('view_cp_path');
    Route::get('/sent-list', 'CampaignController@sentList')->name('sent_list_path');
    Route::get('/sent-view/{list_id}', 'CampaignController@sentview')->name('sent_view_path');
});
Route::group(
    ['prefix' => 'mailing-lists'], function () {
    Route::get('/', 'MailingListController@home')->name('ml_path');
    Route::get('new', 'MailingListController@newList')->name('new_ml_path');
    Route::post('new', 'MailingListController@postNew')->name('post_new_ml_path');
    Route::get('{id}/view', 'MailingListController@view')->name('view_ml_path');
    Route::post('{id}/upload-contacts', ['as' => 'upload_ml_path', 'uses' => 'MailingListController@upload']);
    Route::post('{id}/save-contacts', ['as' => 'save_ml_path', 'uses' => 'MailingListController@saveContacts']);
    Route::get('{id}/delete', ['as' => 'del_ml_path', 'uses' => 'MailingListController@delete']);
});

Route::group(
    ['prefix' => 'test'], function () {
    Route::get('email/{email}', 'TestController@email');
    Route::get('batch', 'TestController@batch');
    Route::get('schedule', 'TestController@schedule');
});

Route::group(
    ['prefix' => 'sms'], function () {
    Route::get('single-send', function () {
        $config = config('services.pensms');
        $client = new SendSingleTextualSms(new BasicAuthConfiguration($config['username'], $config['password']));
        $requestBody = new SMSTextualRequest();
        $requestBody->setFrom("Shegun Babs");
        $requestBody->setTo(['2348188697770']);
        $requestBody->setText("example message");

        try {
            $response = $client->execute($requestBody);
            $sentMessageInfo = $response->getMessages()[0];
            echo "MessageID: ". $sentMessageInfo->getMessageId();
            echo "Receiver: " . $sentMessageInfo->getTo() . "\n";
            echo "Message status: " . $sentMessageInfo->getStatus()->getName();
            dd($sentMessageInfo);
        } catch (Exception $e) {
            echo "HTTP status code: " . $e->getCode() . "\n";
            echo "Error message: " . $e->getMessage();
        }
    });
});

Route::get('phpinfo', function () {
    return phpinfo();
});
