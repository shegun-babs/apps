<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/17/2016
 * Time: 2:41 PM
 */

namespace App\Contracts;


use Illuminate\Support\Collection;

interface Mailer
{

    public function domain($domain);

    public function from($email, $subject);

    public function to(Collection $email);

}