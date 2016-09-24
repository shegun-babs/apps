<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UnsubscribeController extends Controller
{

    public function unsub($list_id, $email)
    {
        return view('aircraft.unsub.start');
    }
}
