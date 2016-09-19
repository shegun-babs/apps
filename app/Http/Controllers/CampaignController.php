<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CampaignController extends Controller
{


    /**
     * CampaignController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $data = auth()->user()->campaign()->get();
        return view('aircraft.campaign.start', compact('data'));
    }
}
