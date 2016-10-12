<?php

namespace App\Http\Controllers;

use App\Repositories\MailingList;
use App\Models\MailingList as MailingList_;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportingController extends Controller
{


    public function unsub(Request $request, MailingList $mailingList)
    {
        if ( $request->mailing_list_id )
            return redirect()->route('unsub_search', ['id'=>$request->mailing_list_id]);
        return view('default.reporting.unsub', ['mailing_list'=>$mailingList->getMailingLists()]);
    }


    public function unsub_search($id, Request $request)
    {
        $data = null;
        $name = (\App\Models\MailingList::where('id',$id)->first());
        if($request->start or ( $request->start & $request->end )){
            $start = trim($request->start) . " 00:00:00";
            $end = trim($request->end) . " 23:59:59";
            $data = DB::table('emarketing_unsubscribes')
                ->select('mailing_list.name','emarketing_unsubscribes.email', 'emarketing_unsubscribes.created_at')->distinct()
                ->where('emarketing_unsubscribes.mailing_list_id', $id)
                ->whereBetween('emarketing_unsubscribes.created_at', [$start, $end])
                ->paginate(10)
                //->toSql();
            ;
        }
        return view('default.reporting.unsub-search', ['id'=>$id, 'name'=>$name->name, 'data'=>$data, 'start'=>$request->start, 'end'=>$request->end]);
    }
}
