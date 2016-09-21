<?php

namespace App\Http\Controllers;

use App\Http\Forms\NewListForm;
use App\Http\Forms\RecipientsUploadForm;
use App\Http\Forms\SaveRecipientsForm;
use App\Jobs\UploadMailingListContacts;
use App\Models\MailingList;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class MailingListController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        //$contactsCount = auth()->user()->emailContacts()->count();
        $data = [];
        $data = auth()->user()->mailingList()->notHidden()->with('recipients')->paginate(5);
        return view('aircraft.mailing-list.list', ['data' => $data]);
    }


    public function postNew(NewListForm $form)
    {
        $form->save();
        flash()->success("List Added Successfully");
        return redirect()->route('ml_path');
    }


    public function saveContacts($id, SaveRecipientsForm $form)
    {
        $form->save();
    }


    public function view($id)
    {
        $dat = [];
        if ($this->verifyOwner($id))
            $list = DB::table('mailing_list')->select('id','name','description')->where('id',$id)->first();
            $data = DB::table('recipients')->select('email','valid','hidden')->where('mailing_list_id', $id)->paginate(100);
        return view('aircraft.mailing-list.view', ['data'=>$data, 'list'=> $list]);
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


    private function verifyOwner($list_id)
    {
        return (bool) MailingList::find($list_id)->user->id == auth()->user()->id;
    }
}
