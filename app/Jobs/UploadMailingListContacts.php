<?php

namespace App\Jobs;

use App\Contracts\EmailValidate;
use App\Contracts\MailService;
use App\Models\MailingList;
use App\Models\Recipient;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class UploadMailingListContacts implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var
     */
    private $filepath;
    /**
     * @var
     */
    private $mailing_list_id;
    /**
     * @var
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @param $filepath
     * @param $mailing_list_id
     * @param $user
     */
    public function __construct($filepath, $mailing_list_id, $user)
    {

        $this->filepath = $filepath;
        $this->mailing_list_id = $mailing_list_id;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param MailService $service
     * @param MailingList $mailingList
     */
    public function handle()
    {
        if ($this->verifyOwner()):

            $emails = explode("\r", file_get_contents($this->filepath));

            foreach ($emails as $email):
                if (filter_var($email, FILTER_VALIDATE_EMAIL)):
                    $now = Carbon::now();
                    DB::insert('insert ignore into recipients (mailing_list_id, email, valid, created_at, updated_at) values (?, ?, ?, ?, ?)', [$this->mailing_list_id, $email, 0, $now, $now]);
                endif;
            endforeach;
        endif;
        unlink($this->filepath);
    }


    public function verifyOwner()
    {
        return (bool)MailingList::find($this->mailing_list_id)->user->id == $this->user->id;
    }


}