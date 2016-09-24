<?php

namespace App\Http\Controllers;

use App\Http\Forms\NewCampaignForm;
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
        $mailingList = auth()->user()->mailingList()->get();
        return view('default.campaigns.start', ['data'=>$data, 'mailingList'=>$mailingList]);
    }


    public function postNew(NewCampaignForm $form)
    {
        $form->save();
        flash()->success("Campaign Created");
        return redirect()->back();
    }


    public function view($id)
    {
        $data = auth()->user()->campaign()->where('id', $id)->with('MailingList')->first();
        return view('default.campaigns.view', compact('data'));
    }
}
