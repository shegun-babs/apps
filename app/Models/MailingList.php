<?php

namespace App\Models;

use App\Model\EmarketingRecipient;
use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    protected $table = 'mailing_list';
    protected $fillable = ['name', 'description', 'hidden'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function emarketingSent()
    {
        return $this->hasMany(EmarketingSent::class);
    }


    public function recipients()
    {
        return $this->hasMany(EmarketingRecipient::class);
        //return $this->hasMany('App\Models\emailContacts', 'foreign_key','local_key');
    }


    public function scopeNotHidden($query)
    {
        return $query->where('hidden', 0);
    }
}
