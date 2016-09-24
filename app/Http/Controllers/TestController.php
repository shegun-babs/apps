<?php

namespace App\Http\Controllers;

use App\Contracts\Mailer;
use App\Models\MailingList;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{


    public function email($email, Mailer $mailer)
    {

        $domain = config('services.jabisod')['domain'];
        $out = $mailer->domain($domain)
            ->from("Jabisod Agencies <info@jabisodagencies.com>", "Jabisod Sales")
            ->to($email)
            ->view('emails.marketing.jabisod.test', ['email'=>encrypt($email)])
            ->send();
        dd($out);
    }


    public function batch()
    {
        $out = MailingList::find(77)->recipients()->where('valid', 1)->get();

        dd(make_r_variables($out)->emails);

        dd($out->emails, $out->data);
    }


    public function schedule()
    {
        $rows = DB::table('recipients')->select('id', 'email')->where('valid', 0)->limit(1000)->get();
        foreach ($rows as $row):
            echo $row->id . '=>>>>' . $row->email . '<br />';
        endforeach;
    }


    public function unsub($email)
    {
        return decrypt($email);
    }
}
