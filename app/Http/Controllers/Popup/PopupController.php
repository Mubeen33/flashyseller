<?php

namespace App\Http\Controllers\Popup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PopupController extends Controller
{
    public function dont_show(Request $request){
    	$uniqID = uniqid();
		$currentTime = Carbon::now();
		$formatNow = $currentTime->format('d-M-Y:H:i:s');
		
		$generateID = $uniqID.$formatNow.mt_rand(10, 99);
		
		//start session
		Session::forget('dont_show_popup');
        $sessionStated = Session::put('dont_show_popup', $generateID);
        $sessionID = Session::get('dont_show_popup');

        if ($sessionID) {
        	return response()->json([
        		'success'=>true,
        		'msg'=>'popup_session_started'
        	], 200);
        }else{
        	return response()->json([
        		'success'=>false,
        		'msg'=>'popup_session_not_started'
        	], 200);
        }
    }
}
