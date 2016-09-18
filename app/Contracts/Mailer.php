<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/17/2016
 * Time: 2:41 PM
 */

namespace App\Contracts;


interface Mailer
{

    public function from($email, $subject);

    public function to($email);

}