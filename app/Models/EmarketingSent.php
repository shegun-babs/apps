<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmarketingSent extends Model
{
    protected $table = 'emarketing_sent';
    protected $fillable = ['email', 'created_at'];
    public $timestamps = false;


    public function mailingList()
    {
        return $this->belongsTo(MailingList::class);
    }
}
