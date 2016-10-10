<?php

namespace App\Model;

use App\Models\MailingList;
use Illuminate\Database\Eloquent\Model;

class EmarketingRecipient extends Model
{
    protected $table = 'emarketing_recipients';
    protected $fillable = ['email', 'valid', 'hidden'];




    public function mailingList()
    {
        $this->belongsTo(MailingList::class);
    }


    public static function store($email, $valid=NULL, $hidden=0)
    {
        return new static( compact('email', 'valid', 'hidden') );
    }
}
