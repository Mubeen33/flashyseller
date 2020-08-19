<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordRecoveryEmail;
use Carbon\Carbon;
use Hash;
use DateTime;
use DatePeriod;
use DateInterval;

class ForgotPassword extends Controller
{	
	public function __construct(){
		$this->middleware('guest:vendor');
	}


    //pass_reset_form
    public function pass_reset_form($token=NULL, $email=NULL){
    	if ($token !== NULL && $email !== NULL) {
    		return view('auth.password-reset-form', compact('token', 'email'));
    	}else{
    		return view('auth.password-reset-form', compact('token', 'email'));
    	}
    }

    //send reset link
    public function send_reset_link(Request $request){
    	$this->validate($request, [
    		'email'=>'required|string|email|max:100'
    	]);

    	$data = Vendor::where('email', $request->email)->first();
    	if (!$data) {
    		return redirect()->back()->with('error', 'SORRY - Email not Found!');
    	}

    	//check old old data
    	$oldData = PasswordReset::where('email', $request->email)->first();
    	if ($oldData) {
    		PasswordReset::where('email', $request->email)->update([
    			'email'=>$request->email,
    			'token'=>uniqid(),
    			'created_at'=>Carbon::now(),
    		]);
    	}else{
    		//insert new
    		PasswordReset::insert([
    			'email'=>$request->email,
    			'token'=>uniqid(),
    			'created_at'=>Carbon::now(),
    		]);
    	}
    	

    	//get data
    	$resetData = PasswordReset::where('email', $request->email)->first();
    	if (!$resetData) {
    		return redirect()->back()->with('error', 'Sorry- Something wrong, please try again later.');
    	}

    	//send reset link to email
    	$siteURL = url('/');
    	Mail::to($request->email)->send(new PasswordRecoveryEmail(
            $siteURL, $data->first_name, $data->last_name, $resetData->token, $request->email
         ));

    	return redirect()->back()->with('success', 'Reset link has been sent to your email & will be expire within 30 minutes.');
    }



    //reset password post
    public function password_reset_post(Request $request){
    	$this->validate($request, [
    		'token'=>'required|string',
    		'email'=>'required|string|email|max:100',
    		'password'=>'required|string|min:8|max:33|confirmed',
    	]);

    	//validate token
    	$resetData = PasswordReset::where([
    		['token', '=', $request->token],
    		['email', '=', $request->email]
    	])->first();

    	if (!$resetData) {
    		return redirect()->route('login')->with('error', 'SORRY - Reset Token or Email mismatch.');
    	}
    	//check expirity
    	$expireAt = (new DateTime($resetData->created_at))->add(DateInterval::createFromDateString('30 minutes'))->format('Y-m-d H:i:s');
    	if ($expireAt < Carbon::now()) {
    		return redirect()->route('login')->with('error', 'SORRY - Your token expired!');
    	}

    	//update the password
    	$updated = Vendor::where('email', $request->email)->update([
    		'password'=>Hash::make($request->password),
    		'updated_at'=>Carbon::now()
    	]);
    	if ($updated == true) {
    		//delete the toke
    		PasswordReset::where([
	    		['token', '=', $request->token],
	    		['email', '=', $request->email]
	    	])->delete();
	    	return redirect()->route('login')->with('success', 'Password has been reset successfuly, please login using new password.');
    	}else{
    		return redirect()->back()->with('error', 'SORRY - Something wrong, please try again');
    	}
    }
}
