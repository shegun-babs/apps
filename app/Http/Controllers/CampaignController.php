<?php

namespace App\Http\Controllers;

use App\Http\Forms\NewCampaignForm;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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
        return view('default.campaigns.start', ['data' => $data, 'mailingList' => $mailingList]);
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


    public function sentList()
    {
        $data = DB::table('emarketing_sent')
            ->distinct()
            ->join('mailing_list', 'emarketing_sent.mailing_list_id', '=', 'mailing_list.id')
            ->select('mailing_list.id', 'mailing_list.name')
            ->get();
        //dd($data);
        return view('default.campaigns.sent-list-list', compact('data'));

    }


    public function sentView(Request $request)
    {
        if ($request->list_id):
            $data = DB::table('emarketing_sent')->where('mailing_list_id', $request->list_id)->paginate(20);
            return view('default.campaigns.sent-view-list', compact('data'));
        endif;
        flash()->message("Invalid Request");
        return redirect()->back();
    }
}
