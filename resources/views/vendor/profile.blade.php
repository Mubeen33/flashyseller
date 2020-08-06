@extends('layouts.master')
@section('page-title','Dashboard')
        

@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection    
                            
@section('content')

            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        Overview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        Business
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                       Addresses
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                       Banking Details
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                        <i class="feather icon-feather mr-50 font-medium-3"></i>
                                        Connections
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Users
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="/images/logo/{{$data[0]->logo}}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <!-- <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light" for="account-upload">Upload new photo</label> -->
                                                            <!-- <input type="file" id="account-upload" hidden=""> -->
                                                            <!-- <button class="btn btn-sm btn-outline-warning ml-50 waves-effect waves-light">Reset</button> -->
                                                            
                                                        </div>
                                                        <!-- <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p> -->
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-warning ml-50 waves-effect waves-light" onclick="overview()" style="margin-top: 16px;"><i class="fa fa-pencil-square"> Edit </i></button>
                                                </div>
                                                <hr>
                                                <form  method="post" enctype="multipart/form-data" action="/vendor/profile_setup">
                                                @csrf    
                                                <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                <div class="media-body mt-75 logo_data" style="display:none;">
                                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                        <!-- <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light" for="account-upload">Upload new photo</label> -->
                                                                        <input type="file" name="logo" id="account-upload" >
                                                                       
                                                                    </div>
                                                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                            size of
                                                                            800kB</small></p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Company Name</label>
                                                                    <input disabled name="company_name" type="text" class="form-control" id="company_name" value="{{$data[0]->company_name}}" placeholder="Company Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Low STock</label>
                                                                    <input disabled type="text"  value="{{$data[0]->low_stock}}" class="form-control" id="low_stock" name="low_stock" placeholder="Low Stock">
                                                                 </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                <label>Out Of Office</label>                 
                                                                    <input disabled type="text"  value="{{$data[0]->out_of_office}}" class="form-control" id="out_of_office" name="out_of_office" placeholder="Out Of Office">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                <label>Account Status</label>                 
                                                                    <input disabled type="text" value="{{$data[0]->is_active}}" class="form-control" name="account_status" id="account_status" placeholder="Status">
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                       
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end " >
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light overview_button"  style="display:none">Save
                                                                changes</button>
                                                            <button type="reset" onclick="overview_cancel()" class="btn btn-outline-warning waves-effect waves-light overview_button"  style="display:none">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <div class="media">
                                           
                                                
                                                                   
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                           <b>{{$data[0]->legal_name}}</b>
                                                        </div>
                                                        <!-- <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p> -->
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-warning ml-50 waves-effect waves-light" onclick="business()" style="margin-top: 16px;"><i class="fa fa-pencil-square"> Edit </i></button>
                                                </div>
                                                <hr>
                                                <form  method="post" enctype="multipart/form-data" action="/vendor/profile_setup_business">
                                                @csrf    
                                                <div class="row">
                                                        
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Legal Name</label>
                                                                    <input disabled name="legal_name" type="text" class="form-control" id="legal_name" value="{{$data[0]->legal_name}}" placeholder="Legal Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Business Type</label>
                                                                    <input disabled type="text"  value="{{$data[0]->business_type}}" class="form-control" id="business_type" name="business_type" placeholder="Business Type">
                                                                 </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Registration Number</label>
                                                                    <input disabled type="text"  value="{{$data[0]->registration_no}}" class="form-control" id="registration_no" name="registration_no" placeholder="Registration No">
                                                                 </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12" id="business_docs">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Business Doc's</label>
                                                                    <a href="/vendor_docs/{{$bank[0]->debit_order_form}}" target="_blank">{{$bank[0]->debit_order_form}}</a>
                                                                   
                                                                 </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                <div class="media-body mt-75 vendor_doc" style="display:none;">
                                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                        <!-- <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light" for="account-upload">Upload new photo</label> -->
                                                                        <input type="file" name="vendor_doc" id="account-upload" >
                                                                       
                                                                    </div>
                                                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                            size of
                                                                            800kB</small></p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                       
                                                       
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light overview_button"  style="display:none">Save
                                                                changes</button>
                                                            <button type="reset" onclick="business_cancel()" class="btn btn-outline-warning waves-effect waves-light overview_button"  style="display:none">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                            <div class="media">
                                           
                                                
                                                                   
                                           <div class="media-body mt-75">
                                               <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                  <b>Manage Addresses</b>
                                               </div>
                                               <!-- <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                       size of
                                                       800kB</small></p> -->
                                           </div>
                                           <button class="btn btn-sm btn-outline-warning ml-50 waves-effect waves-light" onclick="addresses()" style="margin-top: 16px;"><i class="fa fa-pencil-square"> Edit </i></button>
                                       </div>
                                       <hr>
                                       <form  method="post" enctype="multipart/form-data" action="/vendor/profile_setup_address">
                                       @csrf    
                                       <div class="row">
                                               
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-username">Recipient Name</label>
                                                           <input disabled name="recipient_name" type="text" class="form-control" id="recipient_name" value="{{$data[0]->recipient_name}}" placeholder="Recipient Name">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">Street Address</label>
                                                           <input disabled type="text"  value=" {{$data[0]->street_address}}" class="form-control" id="street_address" name="street_address" placeholder="Street Address">
                                                        </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">Street Number</label>
                                                           <input disabled type="text"  value=" {{$data[0]->street_no}}" class="form-control" id="street_no" name="street_no" placeholder="Street No">
                                                        </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">City</label>
                                                           <input disabled type="text"  value=" {{$data[0]->city}}" class="form-control" id="city" name="city" placeholder="City">
                                                        </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">Country</label>
                                                           <input disabled type="text"  value=" {{$data[0]->country}}" class="form-control" id="country" name="country" placeholder="Country">
                                                        </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">Postal Code</label>
                                                           <input disabled type="text"  value=" {{$data[0]->postal_code}}" class="form-control" id="postal_code" name="postal_code" placeholder="Postal Code">
                                                        </div>
                                                   </div>
                                               </div>
                                               
                                               
                                               
                                              
                                              
                                               <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                   <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light addresses_button"  style="display:none">Save
                                                       changes</button>
                                                   <button type="reset" onclick="addresses_cancel()" class="btn btn-outline-warning waves-effect waves-light addresses_button"  style="display:none">Cancel</button>
                                               </div>
                                           </div>
                                         </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                            <div class="media">
                                           
                                                
                                                                        
                                                <div class="media-body mt-75">
                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <b>Manage Addresses</b>
                                                    </div>
                                                    <!-- <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                            size of
                                                            800kB</small></p> -->
                                                </div>
                                                <button class="btn btn-sm btn-outline-warning ml-50 waves-effect waves-light" onclick="bank_details()" style="margin-top: 16px;"><i class="fa fa-pencil-square"> Edit </i></button>
                                            </div>
                                            <hr>
                                       <form  method="post" enctype="multipart/form-data" action="/vendor/bank_details">
                                       @csrf    
                                       <div class="row">
                                               
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-username">Full Name</label>
                                                           <input disabled name="fullname" type="text" class="form-control" id="fullname" value="{{$bank[0]->fullname}}" placeholder="Full Name">
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">Bank Name</label>
                                                           <input disabled type="text"  value=" {{$bank[0]->bank_name}}" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
                                                        </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">Account Number</label>
                                                           <input disabled type="text"  value=" {{$bank[0]->account_no}}" class="form-control" id="account_no" name="account_no" placeholder="Account No">
                                                        </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group">
                                                       <div class="controls">
                                                           <label for="account-name">Branch Code</label>
                                                           <input disabled type="text"  value=" {{$bank[0]->branch_code}}" class="form-control" id="branch_code" name="branch_code" placeholder="Branch Code">
                                                        </div>
                                                   </div>
                                               </div>
                                               <div class="col-12" id="debit_order_form">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-name">Debit Order Form</label>
                                                            <a href="/vendor_docs/{{$bank[0]->debit_order_form}}" target="_blank">{{$bank[0]->debit_order_form}}</a>
                                                            
                                                            </div>
                                                    </div>
                                                </div>
                                               <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                        <div class="media-body mt-75 debit_order_form" style="display:none;">
                                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                <!-- <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer waves-effect waves-light" for="account-upload">Upload new photo</label> -->
                                                                <input type="file" name="debit_order_form" id="account-upload" >
                                                                
                                                            </div>
                                                            <p class="text-muted ml-75 mt-50"><small>Debit Order Form(Allowed PDF Max
                                                                    size of
                                                                    800kB)</small></p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
                                               
                                               
                                               
                                              
                                              
                                               <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                   <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 waves-effect waves-light bank_button"  style="display:none">Save
                                                       changes</button>
                                                   <button type="reset" onclick="bank_cancel()" class="btn btn-outline-warning waves-effect waves-light bank_button"  style="display:none">Cancel</button>
                                               </div>
                                           </div>
                                         </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

      
@endsection      
<script>
function overview(){
   
    // alert('df');
    $('#company_name').attr('disabled',false);
    $('#low_stock').attr('disabled',false);
    $('#out_of_office').attr('disabled',false);
    $('.logo_data').show();
    $('.overview_button').show();
    $('#account_status').attr('disabled',false);
}
function overview_cancel(){
    // alert('dc');
    $('#company_name').attr('disabled',true);
    $('#low_stock').attr('disabled',true);
    $('#out_of_office').attr('disabled',true);
    $('.logo_data').hide();
    $('.overview_button').hide();
    $('#account_status').attr('disabled',true);
}
function business(){
   
   $('#business_docs').hide();
   $('#legal_name').attr('disabled',false);
   $('#business_type').attr('disabled',false);
   $('#registration_no').attr('disabled',false);
   $('.vendor_doc').show();
   $('.overview_button').show();
}
function business_cancel(){
    $('#business_docs').show();
   $('#legal_name').attr('disabled',true);
   $('#business_type').attr('disabled',true);
   $('#registration_no').attr('disabled',true);
   $('.vendor_doc').hide();
   $('.overview_button').hide();
}
function addresses(){
   
   // alert('df');
   $('#recipient_name').attr('disabled',false);
   $('#street_address').attr('disabled',false);
   $('#street_no').attr('disabled',false);
   $('#city').attr('disabled',false);
   $('#country').attr('disabled',false);
   $('#postal_code').attr('disabled',false);
   $('.addresses_button').show();
}
function addresses_cancel(){
   // alert('dc');
   $('#recipient_name').attr('disabled',true);
   $('#street_address').attr('disabled',true);
   $('#street_no').attr('disabled',true);
   $('#city').attr('disabled',true);
   $('#country').attr('disabled',true);
   $('#postal_code').attr('disabled',true);
   $('.addresses_button').hide();
}
function bank_details(){
   
   // alert('df');
   $('#debit_order_form').hide();
   $('#fullname').attr('disabled',false);
   $('#bank_name').attr('disabled',false);
   $('#account_no').attr('disabled',false);
   $('#branch_code').attr('disabled',false);
   $('.debit_order_form').show()
   $('.bank_button').show();
}
function bank_cancel(){
    $('#debit_order_form').show();
   $('#fullname').attr('disabled',true);
   $('#bank_name').attr('disabled',true);
   $('#account_no').attr('disabled',true);
   $('#branch_code').attr('disabled',true);
   $('.debit_order_form').hide();
   $('.bank_button').hide();
}

</script>