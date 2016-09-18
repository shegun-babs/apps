<?php

namespace App\Http\Controllers;

use App\Http\Forms\NewListForm;
use App\Http\Forms\RecipientsUploadForm;
use App\Jobs\UploadMailingListContacts;
use Illuminate\Http\Request;
use App\Http\Requests;

class MailingListController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        //$contactsCount = auth()->user()->emailContacts()->count();
        $data = auth()->user()->mailingList()->notHidden()->with('recipients')->get();
        return view('aircraft.mailing-list.list', ['data'=>$data]);
    }


    public function postNew(NewListForm $form)
    {
        $form->save();
        flash()->success("List Added Successfully");
        return redirect()->route('ml_path');
    }


    public function view($id)
    {
        if ($id)
        $data = auth()->user()->mailingList()->where('id',$id)->with('recipients')->first();
        return view('aircraft.mailing-list.view', compact('data'));
    }


    public function delete($id)
    {
        auth()->user()->mailingList()->where('id', $id)->delete();
        flash()->success('Mailing List Deleted Successfully');
        return redirect()->back();
    }


    public function upload($id, RecipientsUploadForm $form)
    {
        $target = $form->save();
        $this->dispatch(new UploadMailingListContacts($target, $id, auth()->user()));
        flash()->success("File Uploaded Successfully. Your uploads will appear soon.");
        return redirect()->back();
    }
}
