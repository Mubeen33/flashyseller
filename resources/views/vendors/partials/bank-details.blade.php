<div class="row">
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                       <i class="feather icon-user"></i> Bank Details
                </h3>
            </div>
            <div class="col-md-3 text-right">
                <div class="d-flex justify-content-end">
                    @if($data->active == 0)
                    <h3 title="Pending" style="margin-right: 15px">
                        <i class="feather text-danger icon-x"></i>
                    </h3>
                    @else
                    <h3 title="Approved" style="margin-right: 15px">
                        <i class="feather text-primary icon-check"></i>
                    </h3>
                    @endif
                    

                    @php
                        //if vendor has requested for updated bank details then hide the edit icon
                        $BankDetailsTempData = (\App\VendorBankDetailsTempData::where(['vendor_id'=>Auth::guard('vendor')->user()->id, 'status'=>0])->first());
                    @endphp

                    @if(!$BankDetailsTempData)
                    <h3 style="cursor: pointer;" title="Edit Profile" id="btn-edit-bank-details">
                        <i class="feather text-primar icon-edit"></i>
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- row end here-->
    <div class="col-md-12 border border-primary"></div>


    <div class="col-md-12">
        <!--Show seller Details-->
        <div id="show--bank-details">
            <div class="card">
                <div class="card-body pr-0 pl-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">

                                    @if($BankDetailsTempData) 
                                    <h4>
                                        <small class="form-control text-danger">
                                            <span>Requested to Update Bank details at {{ $BankDetailsTempData->created_at->format('d/m/Y') }}</span> <span class="badge badge-danger">Pending</span>
                                        </small>
                                    </h4>
                                    @endif

                                    <div class="row pt-0">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Account Holder</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            @if($BankDetailsTempData)
                                                {{ $BankDetailsTempData->account_holder }}
                                            @else
                                                {{$data->account_holder}}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Bank</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            @if($BankDetailsTempData)
                                                {{ $BankDetailsTempData->bank_name }}
                                            @else
                                                {{$data->bank_name}}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Bank Account</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            @if($BankDetailsTempData)
                                                {{ $BankDetailsTempData->bank_account }}
                                            @else
                                                {{$data->bank_account}}
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Branch Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            @if($BankDetailsTempData)
                                                {{ $BankDetailsTempData->branch_name }}
                                            @else
                                                {{$data->branch_name}}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3">
                                            <strong>Branch Code</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            @if($BankDetailsTempData)
                                                {{ $BankDetailsTempData->branch_code }}
                                            @else
                                                {{$data->branch_code}}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
        </div>
    </div><!-- row end here-->


    <div class="col-md-12">
        <div id="edit--bank-details" class="d-none">
            @include('vendors.partials.update-bank-details')
        </div>
    </div> <!-- row end here-->
    
</div>

