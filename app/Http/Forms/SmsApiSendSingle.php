<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/25/2016
 * Time: 8:58 PM
 */

namespace App\Http\Forms;


use Illuminate\Support\Facades\Validator;

class SmsApiSendSingle extends Form
{
    protected $rules = [
        'auth' => 'required',
        'sender' => 'required|alpha_dash|min:3|max:11',
        'recipient' => 'required',
        'message' => 'required|min:1|max:2',
        'schedule' => '',
        'flash' => '',
    ];
    protected $messages = [
        'auth.required' => '-10:EMPTY_CREDENTIALS',
        'sender.required' => '-12:EMPTY_SENDER_ADDRESS',
        'recipient.required' => '-14:EMPTY_RECIPIENT_ADDRESS',
        'message.required' => '-16:EMPTY_MESSAGE_CONTENT'
    ];

    public function persist()
    {
        // TODO: Implement persist() method.
    }

    public function save()
    {
        //dd($this->request->get('auth'));
        return $this->validates();
    }

    public function validates()
    {
        $validator = Validator::make($this->fields(), $this->rules, $this->messages);

        if ($validator->fails()):

            $bag = $validator->errors();
            $response['response']['error'] = TRUE;
            //dd($bag);
            switch ( (bool) $bag->count()) {
                case( (bool)$bag->has('auth') ):
                    $res = $this->splitString($bag->messages()['auth'][0]);
                    $response['response']['errorData'][] = $res;

                case ( (bool)$bag->has('sender') ):
                    $res = $this->splitString($bag->messages()['sender'][0]);
                    $response['response']['errorData'][] = $res;

                case ( (bool)$bag->has('recipient') ):
                    $res = $this->splitString($bag->messages()['recipient'][0]);
                    $response['response']['errorData'][] = $res;


                case ( (bool)$bag->has('message') ):
                    $res = $this->splitString($bag->messages()['message'][0]);
                    $response['response']['errorData'][] = $res;
                    break;

            }

            return response()->json($response);
        endif;

        return response()->json(['response'=>['success'=>true]]);


    }


    public function splitString($string)
    {
        $split = explode(':', $string);
        return [
            'status' => $split[0],
            'description' => $split[1],
        ];
    }


}