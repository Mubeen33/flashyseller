<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\VendorActivity;
use Carbon\Carbon;

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
            //record activity
            $this->loggedInActivity();
            return redirect()->intended(route('vendor.dashboard.get'));
    	}

    	//if unsuccess to login then redirect
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    	
    }


    //activity tract
    private function loggedInActivity(){
        $ip = \Request::ip();
        $browser = "";

        $agent = $_SERVER["HTTP_USER_AGENT"];
        // Check to see if it contains the keyword `Chrome` followed by a version number
        if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
          $browser = "Chrome";
        }elseif (preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Firefox";
        }elseif (preg_match('/Safary[\/\s](\d+\.\d+)/', $agent)) {
            $browser = "Safary";
        }else{
            $browser = "Unknown";
        }

        //IP to address
        $getIP_location = \Location::get(($ip == "127.0.0.1" ? "66.102.0.0" : $ip));
        $location = "Unknown";
        if ($getIP_location != NULL) {
            $location = $getIP_location->countryName.', '.$getIP_location->regionName.', '.$getIP_location->cityName;
        }

        $data = json_encode([
                    'Time'=>date('d/m/Y H:i', strtotime(Carbon::now())), 
                    'Access Via'=>$browser, 
                    'IP'=>$ip,
                    'Location'=>$location,
                ]);

        //insert record
        VendorActivity::insert([
            'vendor_id'=>Auth::guard('vendor')->user()->id,
            'activityName'=>'Login',
            'activities'=>$data,
            'is_loogedIn'=>'Active',
            'created_at'=>Carbon::now()
        ]);
    }
}
