<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\VendorBankDetailsTempData;
use Carbon\Carbon;
use Auth;
use Hash;

class VendorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    
    // Vendor Dashboard
    public function dashboard(Request $request)
    {   
        //return dashabord view
        return view('index');
    }

    

    public function profile(){
      $data = Vendor::where('id', Auth::guard('vendor')->user()->id)->first();
      return view('vendors.profile', compact('data'));
    }


    //resoucres methods
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //store vendor requests
        if ($request->type === "UpdateSellerDetails") {
            $this->validate($request, [
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors,email,'.$id],
                'mobile' => ['required', 'string', 'max:16']
            ]);
            return $this->updateSellerDetails($request);
        
        }elseif ($request->type === "UpdateContactDetails") {
            $this->validate($request, [
                'company_name' => ['required', 'string', 'max:250'],
                'business_information' => ['nullable', 'string', 'max:300']
            ]);
            return $this->updateContactDetails($request);
        
        }elseif ($request->type === "UpdateBankDetails") {
            $this->validate($request, [
                'account_holder' => ['nullable', 'string', 'max:250'],
                'bank_name' => ['nullable', 'string', 'max:250'],
                'bank_account' => ['nullable', 'string', 'max:250'],
                'branch_name' => ['nullable', 'string', 'max:250'],
                'branch_code' => ['nullable', 'string', 'max:250'],
            ]);
            return $this->updateBankDetails($request);

        }elseif ($request->type === "UpdateDirectorDetails") {
            $this->validate($request, [
                'director_first_name' => ['nullable', 'string', 'max:250'],
                'director_last_name' => ['nullable', 'string', 'max:250'],
                'director_email' => ['nullable', 'string', 'email', 'max:250'],
                'director_details' => ['nullable', 'string', 'max:300'],
                'website_url' => ['nullable', 'string', 'url', 'max:250'],
                'vat_register' => ['nullable', 'string', 'in:Yes,No'],
                'additional_info' => ['nullable', 'string', 'max:300'],
                'product_type' => ['nullable', 'string', 'in:Physical Products,Digital Products,Grouped Products,Services'],
            ]);
            return $this->updateDirectorDetails($request);
        
        }elseif ($request->type === "UpdateBusinessAddressDetails") {
            $this->validate($request, [
                'address' => ['nullable', 'string', 'max:250'],
                'street' => ['nullable', 'string', 'max:250'],
                'city' => ['nullable', 'string', 'max:250'],
                'state' => ['nullable', 'string', 'max:250'],
                'subrub' => ['nullable', 'string', 'max:250'],
                'zip_code' => ['nullable', 'string', 'max:250'],
                'country' => ['nullable', 'string', 'max:250'],
            ]);
            return $this->updateBusinessAddressDetails($request);
        
        }elseif ($request->type === "UpdateWireHouseAddressDetails") {
            $this->validate($request, [
                'waddress' => ['nullable', 'string', 'max:250'],
                'wstreet' => ['nullable', 'string', 'max:250'],
                'wcity' => ['nullable', 'string', 'max:250'],
                'wstate' => ['nullable', 'string', 'max:250'],
                'wsubrub' => ['nullable', 'string', 'max:250'],
                'wzip_code' => ['nullable', 'string', 'max:250'],
                'wcountry' => ['nullable', 'string', 'max:250'],
            ]);
            return $this->updateWireHouseAddressDetails($request);
        }else{
            return redirect()->back()->with('error', 'SORRY - Invalid Request');
        }
        
        
        
    }


    private function updateSellerDetails($request){
        //if validation pass
        $updated = Vendor::where('id', Auth::guard('vendor')->user()->id)->update([
           'first_name'=> $request->first_name,
           'last_name'=> $request->last_name,
           'email'=> $request->email,
           'phone'=> $request->phone,
           'mobile'=> $request->mobile,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Profile Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateContactDetails($request){
        //if validation pass
        $updated = Vendor::where('id', Auth::guard('vendor')->user()->id)->update([
           'company_name'=> $request->company_name,
           'business_information'=> $request->business_information,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Contact Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateBankDetails($request){
        //if validation pass, data inserted to seperate tbl for approval
        $inserted = VendorBankDetailsTempData::insert([
           'vendor_id'=> Auth::guard('vendor')->user()->id,
           'account_holder'=> $request->account_holder,
           'bank_name'=> $request->bank_name,
           'bank_account'=> $request->bank_account,
           'branch_name'=> $request->branch_name,
           'branch_code'=> $request->branch_code,
           'created_at'=> Carbon::now()
        ]);
        
        if($inserted == true){
            return redirect()->back()->with('success', 'Bank Details data stored successfully. Please wait for admin approval.');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateDirectorDetails($request){
        //if validation pass
        $updated = Vendor::where('id', Auth::guard('vendor')->user()->id)->update([
           'website_url'=> $request->website_url,
           'director_first_name'=> $request->director_first_name,
           'director_last_name'=> $request->director_last_name,
           'director_email'=> $request->director_email,
           'director_details'=> $request->director_details,
           'vat_register'=> $request->vat_register,
           'additional_info'=> $request->additional_info,
           'product_type'=> $request->product_type,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Director Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateBusinessAddressDetails($request){
        //if validation pass
        $updated = Vendor::where('id', Auth::guard('vendor')->user()->id)->update([
           'address'=> $request->address,
           'street'=> $request->street,
           'city'=> $request->city,
           'state'=> $request->state,
           'subrub'=> $request->subrub,
           'zip_code'=> $request->zip_code,
           'country'=> $request->country,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'Business Address Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    private function updateWireHouseAddressDetails($request){
        //if validation pass
        $updated = Vendor::where('id', Auth::guard('vendor')->user()->id)->update([
           'waddress'=> $request->waddress,
           'wstreet'=> $request->wstreet,
           'wcity'=> $request->wcity,
           'wstate'=> $request->wstate,
           'wsubrub'=> $request->wsubrub,
           'wzip_code'=> $request->wzip_code,
           'wcountry'=> $request->wcountry,
           'updated_at'=> Carbon::now()
        ]);
        
        if($updated == true){
            return redirect()->back()->with('success', 'WireHouse Address Details Updated');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    //update pass
    public function update_vendor_pass(Request $request){
        $this->validate($request, [
            'new_pass'=>'required|string|min:8|max:33'
        ]);

        $updated = Vendor::where('id', Auth::guard('vendor')->user()->id)->update([
            'password'=>Hash::make($request->new_pass),
            'updated_at'=>Carbon::now()
        ]);

        if ($updated == true) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Updated');
        }else{
            return redirect()->back()->with('error', 'SORRY - Something wrong.');
        }
    }









    /*Old Codes -  not used

    // Vendor Login Function Starts
    public function vendor_login(Request $request)
    {   
        $password =$request->password;
        $email =   $request->email;
        $user = DB::table('vendors')
                    ->select('id','active','password','email')
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


    //vendor login form
    public function vendor_login_form(){
        return view('auth.login');
    }

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
                $data = DB::table('vendors')
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

    */
    
}
