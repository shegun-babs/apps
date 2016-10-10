<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Contracts\Encryption\DecryptException;

class UnsubscribeController extends Controller
{

    public function unsub($list_id, $email)
    {
    	try{
    		$list_id = decrypt($list_id);
    		$email = decrypt($email);
    		DB::table('emarketing_unsubscribes')
    			->insert([
    				'mailing_list_id' => $list_id,
    				'email' => $email,
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now(),
    				]);
    	} catch(DecryptException $e) {
    		flash()->error("Your email was not found on our list");
    	}
        return view('default.unsub.start', compact('email'));
    }


	public function search()
	{
		return view('default.unsub.search');
	}


    public function postSearch($id,Request $request)
    {
        $start = trim($request->start_date) . " 00:00:00";
        $end = trim($request->end_date) . " 23:59:59";
        $data = DB::table('emarketing_unsubscribes')
            ->select('email', 'created_at')
            ->where('mailing_list_id', $id)
            ->whereBetween('created_at', [$start, $end])
            ->toSql()
            //->paginate(10)
            ;
        dd($data);
        return view('default.unsub.search', compact('data'));
    }
}
