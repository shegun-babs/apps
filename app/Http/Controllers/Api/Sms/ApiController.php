<?php

namespace App\Http\Controllers\Api\Sms;

use App\Http\Controllers\Controller;
use App\Http\Forms\SmsApiSendSingle;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    protected $rules = [
        'auth' => 'required',
    ];
    protected $messages = [];

    public function send_single(SmsApiSendSingle $request)
    {
        return  $request->save();


        dd($request->fields());
        $variables = $request->fields();
        //get request variables
        //get user from the auth variable
        //bill user
        //communicate with external API
        //get response
        //save response to database table
    }
}
