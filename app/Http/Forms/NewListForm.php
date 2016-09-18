<?php

namespace App\Http\Forms;

class NewListForm extends Form
{

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'hidden' => 'required|min:0|max:1',
    ];
    protected $messages = [

    ];


    public function persist()
    {
        $list = auth()->user()->mailingList()->create( $this->fields() );
    }



}