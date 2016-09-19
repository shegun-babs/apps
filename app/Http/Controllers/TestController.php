<?php

namespace App\Http\Controllers;

use App\Contracts\Mailer;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{


    public function email(Mailer $mailer)
    {
        $out = $mailer->domain('shegunbabs.com')
            ->from("segun@segunbabs.com", "Jabisod email test")
            ->to("segxzyl@yahoo.co.uk")
            ->view('emails.marketing.jabisod.test')
            ->oTag('marketing-email')
            ->send()
        ;
        dd($out);
    }
}
