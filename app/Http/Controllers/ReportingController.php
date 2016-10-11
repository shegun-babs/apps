<?php

namespace App\Http\Controllers;

use App\Repositories\MailingList;
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
        if($request->start or ( $request->start & $request->end )){
            $start = trim($request->start) . " 00:00:00";
            $end = trim($request->end) . " 23:59:59";
            $data = DB::table('emarketing_unsubscribes')
                ->select('email', 'created_at')->distinct()
                ->where('mailing_list_id', $id)
                ->whereBetween('created_at', [$start, $end])
                ->paginate(10);
        }
        return view('default.reporting.unsub-search', ['id'=>$id, 'data'=>$data, 'start'=>$request->start, 'end'=>$request->end]);
    }
}
