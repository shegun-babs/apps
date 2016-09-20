<?php

namespace App\Http\Controllers;

use App\Contracts\Mailer;
use App\Models\MailingList;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{


    public function email(Mailer $mailer)
    {
        $users = collect(["segxzyl@yahoo.co.uk, shegunbabs@gmail.com"]);
        $out = $mailer->domain('shegunbabs.com')
            ->from("segun@shegunbabs.com", "Jabisod Sales for %recipient.email%")
            ->to($users)
            ->view('emails.marketing.jabisod.test')
            ->oTag('marketing-email')
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
}
