<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CampaignController extends Controller
{


    public function all()
    {
        $data = auth()->user()->campaign()->get();
        return view('aircraft.campaign.start', compact('data'));
    }
}
