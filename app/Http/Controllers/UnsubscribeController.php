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


    public function postSearch(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;
        $data = DB::table('emarketing_recipients')->select('email', 'created_at')->whereBetween('created_at', [$start, $end])->paginate(10);
        return view('default.unsub.search', compact('data'));
    }
}
