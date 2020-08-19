<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class VendorLogout extends Controller
{
    //logout
    public function logout(Request $request){
    	Auth::logout();
	    $request->session()->invalidate();
	    return redirect('/login');
    }
}
