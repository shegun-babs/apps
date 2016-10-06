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
use Illuminate\Support\Facades\Gate;

class MailingListController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $data = auth()->user()->mailingList()->paginate(20);
        return view('default.mailing-list.mailing-lists', ['data' => $data]);
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
        $mailingList = MailingList::find($id);
        if ( Gate::allows('list-owner', $mailingList) ){
            $count = DB::select('select count(*) as all_recipients from recipients where mailing_list_id = ?', [$id]);
            $sent_emails = DB::select('select count(*) as sent_emails from emarketing_sent where mailing_list_id = ?', [$id]);
            $unsubscribes = DB::select('select count(*) as unsubscribes from emarketing_unsubscribes where mailing_list_id = ?', [$id]);
            $data = auth()->user()->mailingList()->first();
            return view('default.mailing-list.view',
                ['data'=>$data, 'count'=>$count[0]->all_recipients, 'sent_emails'=>$sent_emails[0]->sent_emails, 'unsubscribes'=>$unsubscribes[0]->unsubscribes]);
        } else {
            flash()->error("You are not authorized to view");
            return redirect()->back();
        }
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
        return (bool)MailingList::find($list_id)->user->id == auth()->user()->id;
    }
}
