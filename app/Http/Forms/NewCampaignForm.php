<?php

namespace App\Http\Forms;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewCampaignForm extends Form
{

    protected $rules = [
        'name' => 'required',
        'description' => 'string|min:5',
        'startdate' => 'required|date',
        'mailingList' => 'required|string',
    ];
    protected $messages = [

    ];


    public function persist()
    {
        $this->request->merge(['mailing_list_id' => $this->mailingList ]);
        $campaign = Auth::user()->campaign()->create($this->fields());
    }


}