<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 10/11/2016
 * Time: 5:03 PM
 */

namespace App\Repositories;


use App\Models\MailingList as MailingList_;

class MailingList
{


    /**
     * MailingList constructor.
     */
    public function __construct()
    {
    }


    public function getMailingLists()
    {
        return auth()->user()->mailingList()->get();
    }


    public function getUserMailingLists()
    {
        return MailingList_::all();
    }
}