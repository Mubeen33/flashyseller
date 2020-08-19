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
                    <h3 title="Approved" style="margin-right: 15px">
                        <i class="feather text-primary icon-close"></i>
                    </h3>
                    @else
                    <h3 title="Approved" style="margin-right: 15px">
                        <i class="feather text-primary icon-check"></i>
                    </h3>
                    @endif
                    
                    <h3 style="cursor: pointer;" title="Edit Profile" id="btn-edit-bank-details">
                        <i class="feather text-primar icon-edit"></i>
                    </h3>
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
                                    <div class="row pt-0">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Account Holder</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->account_holder}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Bank</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->bank_name}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Bank Account</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->bank_account}}
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Branch Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->branch_name}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3">
                                            <strong>Branch Code</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->branch_code}}
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

