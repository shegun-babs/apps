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
        'enddate' => 'required|date',
        'starthour' => 'required|integer',
        'endhour' => 'required|integer',
    ];
    protected $messages = [

    ];


    public function persist()
    {
        $this->request->merge([
            'startdate' => Carbon::createFromFormat("m/d/Y",$this->startdate),
            'enddate' => Carbon::createFromFormat("m/d/Y",$this->enddate),
        ]);
        $campaign = Auth::user()->campaign()->create($this->fields());
    }



}