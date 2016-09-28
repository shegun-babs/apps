<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illiminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests;

class UnsubscribeController extends Controller
{

    public function unsub($list_id, $email)
    {
    	try{
    		$list_id = decrypt($list_id);
    		$email = decrypt($email);
    		DB::table('emarketing_unsubscribes')
    			->insert([
    				'list_id' => $list_id,
    				'email' => $email,
    				'created_at' => Carbon::now(),
    				'updated_at' => Carbon::now(),
    				]);
    	} catch(\Exception $e) {

    	}
        return view('default.unsub.start', compact('email'));
    }
}
