<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\VendorDetail;
use App\BankDetail;
use App\Home_Page;
use App\Inquiry;
use DB;
use Hash;
use Session;

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Vendor Dashboard Starts
    public function index(Request $request)
    {   
        if($request->session()->has('active'))
        {
            return view('index');
        }else{
             return redirect('/login');
        }
      
    }

    // Vendor Dashboard Closed


    // Vendor Login Function Starts
    public function vendor_login(Request $request)
    {   
        $password =$request->password;
        $email =   $request->email;
        $user = DB::table('vendor')
                    ->select('id','is_active','password','email')
                    ->where('email',$email)
                    ->where('password',$password)
                    ->get();
        if($user[0]->email==$email){
            Session::put('active', $user[0]->id);
            return redirect('/');
        }else{
               return redirect('/login');
        }
       
    }
     // Vendor Login Function Closed

     // Vendor Loging Out Function Starts
    public function Logout(Request $request){
           if($request->id !=''){
                Session::flush();
                echo"1";
           }else{
            echo "2";
           }
    
    
    }
    // Vendor Loging Out Function CLosed
     public function register()
    {   
       return redirect('/register');
    }
     public function vendor_register(Request $request)
    {   
       $vendor = new Vendor;
                $vendor->first_name = $request->first_name;
                $vendor->last_name = $request->last_name;
                $vendor->username = $request->username;
                $vendor->company_name = $request->company_name;
                $vendor->email = $request->email;
                $vendor->is_active = 1;
                $vendor->password =  $request->password;
                // $vendor->password =  Hash::make($request->password);
                $vendor->save();
                return redirect('/login');
            
    }
    


         public function profile_setup(Request $request)
            {   
                $data = DB::table('vendor')
                    ->join('vendor_details','vendor_details.vendor_id','=','vendor.id')
                    ->select('*')
                    ->where('vendor.id',$request->session()->get('active'))
                    ->get();
                 $bank = DB::table('bank_details')
                        ->join('vendor','bank_details.vendor_id','=','vendor.id')
                        ->select('bank_details.*')
                        ->where('vendor.id',$request->session()->get('active'))
                        ->get();
                // dd($data);
                    if($request->session()->has('active'))
                    {
                        return view('vendor.profile',compact('data','bank'));
                    }else{
                         return redirect('/login');
                    }
              }
            

            public function post_profile(Request $request)
            {   
                     // dd($request->all());
                    if($request->session()->has('active'))
                    {
                        if ($request->logo != '') {
                        $image = $request->file('logo');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/images/logo');
                        $image->move($destinationPath, $name);
                      
                        Vendor::where('id', $request->session()->get('active'))
                           ->update([
                                'logo'=>$name, 
                                'company_name'=>$request->company_name, 
                                'low_stock'=>$request->low_stock, 
                                'out_of_office'=>$request->out_of_office,
                                'is_active'=>$request->account_status, 
                            ]);
                           return redirect()->back()->with('message', 'Updated successfully..');
                    }else{
                         return redirect('/login');
                    }
              }

            }
              public function post_business(Request $request)
            {   
                     // dd($request->all());
                    if($request->session()->has('active'))
                    {
                        if ($request->vendor_doc != '') {
                        $image = $request->file('vendor_doc');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/business_docs/');
                        $image->move($destinationPath, $name);
                      
                        VendorDetail::where('vendor_id', $request->session()->get('active'))
                           ->update([
                                'legal_name'=>$request->legal_name, 
                                'business_type'=>$request->business_type, 
                                'registration_no'=>$request->registration_no, 
                                'document'=>$name,
                                
                            ]);
                           return redirect()->back()->with('message', 'Updated successfully..');
                    }else{
                         return redirect('/login');
                    }
              }

            }
             public function post_addresses(Request $request)
            {   
                    // dd($request->all());
                    if($request->session()->has('active'))
                    {
                       
                        VendorDetail::where('vendor_id', $request->session()->get('active'))
                           ->update([
                                'recipient_name'=>$request->recipient_name, 
                                'street_address'=>$request->street_address, 
                                'street_no'=>$request->street_no, 
                                'city'=>$request->city,
                                'country'=>$request->country, 
                                'postal_code'=>$request->postal_code, 
                            ]);
                           return redirect()->back()->with('message', 'Updated successfully..');
                    }else{
                         return redirect('/login');
                    }
              }
         
        public function post_bank(Request $request)
            {   
                    // dd($request->all());
                    if($request->session()->has('active'))
                    {
                       if ($request->debit_order_form != '') {
                        $image = $request->file('debit_order_form');
                        $name = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/vendor_docs/');
                        $image->move($destinationPath, $name);
                      
                        BankDetail::where('vendor_id', $request->session()->get('active'))
                           ->update([
                                'fullname'=>$request->fullname, 
                                'bank_name'=>$request->bank_name, 
                                'account_no'=>$request->account_no, 
                                'branch_code'=>$request->branch_code,
                                'debit_order_form'=>$name, 
                                'approval_status'=>0, 
                            ]);
                           return redirect()->back()->with('message', 'Updated successfully..');
                    }else{
                         return redirect('/login');
                    }
              }
          }

    
    
}
