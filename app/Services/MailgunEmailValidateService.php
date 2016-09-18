<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/17/2016
 * Time: 2:44 PM
 */

namespace App\Services;

use App\Contracts\EmailValidate;

class MailgunEmailValidateService implements EmailValidate
{
    protected $result;
    /**
     * @var
     */
    private $client;


    /**
     * MailgunEmailValidateService constructor.
     */
    public function __construct($client)
    {

        $this->client = $client;
    }

    public function validate($email)
    {
        $this->result = $this->client->get("address/validate", ['address' => $email]);
        return $this;
    }

    public function isValid()
    {
        return $this->result->http_response_body->is_valid;
    }


    public function alternateEmail()
    {
        return $this->result->http_response_body->did_you_mean;
    }


}