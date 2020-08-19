<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class VendorLogin extends Controller
{
	public function __construct(){
		$this->middleware('guest:vendor');
	}

    //login form
    public function login_form(){
    	return view('auth.login');
    }

    //attemt to login
    public function login(Request $request){
    	//validate form data
    	$this->validate($request, [
    		'email' => 'required|string|email|max:100',
    		'password' => 'required|min:8',
    	]);

    	//attempt to log user in
    	if (Auth::guard('vendor')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
    		//if success to login then redirect
    		return redirect()->intended(route('vendor.dashboard.get'));
    	}

    	//if unsuccess to login then redirect
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    	
    }
}
