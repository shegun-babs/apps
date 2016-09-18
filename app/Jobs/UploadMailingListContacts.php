<?php

namespace App\Jobs;

use App\Contracts\EmailValidate;
use App\Contracts\MailService;
use App\Models\MailingList;
use App\Models\Recipient;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    public function handle(EmailValidate $service, MailingList $mailingList)
    {
        if ($this->verifyOwner()):

            $emails = explode("\r", file_get_contents($this->filepath));

            foreach ($emails as $email):
                $r = $service->validate($email);
                $mailingListModel = $mailingList->find($this->mailing_list_id);
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $r->isValid() && !$mailingListModel->recipients()->where('email', $email)->first()):
                    $mailingListModel->recipients()->create(['email' => $email, 'valid' => 1]);
                endif;
            endforeach;

//            foreach ($file as $email):
//                $email = trim($email);
//                $r = $service->validate($email);
//                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $r->isValid()):
//                    $mailingList->find($this->mailing_list_id)->recipients()->create(['email' => $email, 'valid' => 1]);
//                //$model[] = new Recipient(['email' => $email, 'valid' => 1,]);
//                else:
//                    $mailingList->find($this->mailing_list_id)->recipients()->create(['email' => $email,]);
//                    //$model[] = new Recipient(['email' => $email, 'valid' => 0,]);
//                endif;
//            endforeach;
            //$mailingList->find($this->mailing_list_id)->recipients()->saveMany($model);
        endif;
        unlink($this->filepath);
    }


    public function verifyOwner()
    {
        return (bool)MailingList::find($this->mailing_list_id)->user->id == $this->user->id;
    }


}