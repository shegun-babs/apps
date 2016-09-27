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
        //return view('emails.marketing.jabisod.campaign_one');
        $text = "This email is to introduce you to the wide range of services and products jabisod has to offer";
        $bcc = 'segxzyl@gmail.com';
        $list_id = 77;
        $domain = config('services.jabisod')['domain'];
        $out = $mailer->domain($domain)
            ->from("Jabisod Services <support@jabisodagencies.com>", "Home and Office Improvement Solutions")
            ->to($email)
            ->bcc($bcc)
            ->view('emails.marketing.jabisod.campaign_one', ['email'=>encrypt($bcc),'list_id'=>encrypt($list_id)])
            ->text($text)
            ->send();
        if ( $out->http_response_code == 200 )
            return 'sent';
        else
            return 'not done';
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
