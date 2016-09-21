<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/21/2016
 * Time: 11:16 AM
 */

namespace App\Http\Forms;


use App\Models\MailingList;

class SaveRecipientsForm extends Form
{

    protected $rules = [
        'emails' => 'required',
    ];



    public function persist()
    {
        $emails = explode(",", $this->emails);

        foreach($emails as $email)

        MailingList::find($this->id)->recipients();
        dd($this->id);
    }


}