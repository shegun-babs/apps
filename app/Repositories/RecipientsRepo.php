<?php
namespace App\Repositories;

use App\Contracts\EmailValidate;
use App\Services\MailgunEmailValidateService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/21/2016
 * Time: 12:36 PM
 */
class RecipientsRepo
{
    /**
     * @var MailgunEmailValidateService
     */
    /**
     * @var EmailValidate|MailgunEmailValidateService
     */
    private $emailValidate;

    /**
     * RecipientsRepo constructor.
     */
    public function __construct(EmailValidate $emailValidate)
    {
        $this->emailValidate = $emailValidate;
    }


    public static function saveRecipients(Array $emails, $mailing_list_id)
    {
        foreach ($emails as $email):
            if (filter_var($email, FILTER_VALIDATE_EMAIL)):
                $now = Carbon::now();
                DB::insert('insert ignore into recipients (mailing_list_id, email, valid, created_at, updated_at) values (?, ?, ?, ?, ?)', [$mailing_list_id, $email, 0, $now, $now]);
            endif;
        endforeach;
    }


    public function validateEmails($limit = 1000)
    {
        //$data = DB::
        //1, select 1000 rows
        //2, loop through and
        //3, validate the email,
        //4, if valid, strtolower and update corresponding row with valid=1
        //5, if not valid remove row.

        #1
        $data = DB::table('recipients')->select('email')->where('valid', 0)->limit($limit)->get();

        #2 loop thru
        foreach ($data as $row):
            #3 validate email
            if ($this->emailValidate->validate($row->email)->isValid()):
                #4 update db row
                DB::table('recipients')->where('email', $row->email)->update(['valid' => 1]);
            else:
                DB::table('recipients')->where('email', $row->email)->delete();
            endif;
        endforeach;
    }
}