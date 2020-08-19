<div class="row">
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                       <i class="feather icon-user"></i> Profile Details
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
                    
                    <h3 style="cursor: pointer;" title="Edit Profile" id="btn-edit-seller-details">
                        <i class="feather text-primar icon-edit"></i>
                    </h3>
                </div>
            </div>
        </div>
    </div> <!-- row end here-->
    <div class="col-md-12 border border-primary"></div>


    <div class="col-md-12">
        <!--Show seller Details-->
        <div id="show--seller-details">
            <div class="card">
                <div class="card-body pr-0 pl-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Status</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            @if($data->active == 0)
                                                <span class="badge badge-danger">{{ 'Pending' }}</span>
                                                @else
                                                <span class="badge badge-success">{{ 'Approved' }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>First Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->first_name}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Last Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->last_name}}
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Mobile Number</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->mobile}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3">
                                            <strong>Phone Number</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->phone}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Email</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->email}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Password</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">

                                            @include('vendors.partials.password')

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
        <div id="edit--seller-details" class="d-none">
            @include('vendors.partials.update-seller-details')
        </div>
    </div> <!-- row end here-->

</div>

