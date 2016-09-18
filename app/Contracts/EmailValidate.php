<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/17/2016
 * Time: 2:27 PM
 */

namespace App\Contracts;


interface EmailValidate
{
    public function validate($email);


    public function isValid();
}