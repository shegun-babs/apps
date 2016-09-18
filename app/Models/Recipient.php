<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $table = 'recipients';
    protected $fillable = ['email', 'valid', 'hidden'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function mailingList()
    {
        return $this->belongsTo('App\Models\MailingList');
    }


    public static function store($email, $valid=NULL, $hidden=0)
    {
        return new static( compact('email', 'valid', 'hidden') );
    }
}
