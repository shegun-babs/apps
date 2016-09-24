<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $fillable = ['name', 'mailing_list_id', 'description', 'startdate'];
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function mailingList()
    {
        return $this->belongsTo('App\Models\MailingList');
    }

}
