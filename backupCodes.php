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
                'token'=>uniqid().Hash::make($request->email),
                'created_at'=>Carbon::now(),
            ]);
        }else{
            //insert new
            PasswordReset::insert([
                'email'=>$request->email,
                'token'=>uniqid().Hash::make($request->email),
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

        return redirect()->back()->with('success', 'Reset link has been sent to your email');
    }
}
