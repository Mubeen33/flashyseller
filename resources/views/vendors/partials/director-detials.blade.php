<div class="row">
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                       <i class="feather icon-user"></i> Director Details
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
                    
                    <h3 style="cursor: pointer;" title="Edit Profile" id="btn-edit-director-details">
                        <i class="feather text-primar icon-edit"></i>
                    </h3>
                </div>
            </div>
        </div>
    </div> <!-- row end here-->
    <div class="col-md-12 border border-primary"></div>


    <div class="col-md-12">
        <!--Show seller Details-->
        <div id="show--director-details">
            <div class="card">
                <div class="card-body pr-0 pl-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row pt-0">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Director First Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->director_first_name}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Director Last Name</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->director_last_name}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Director Email</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->director_email}}
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Director Details</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->director_details}}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Website URL</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->website_url}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Vat Register?</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->vat_register}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Additonal Info.</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->additional_info}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Product Type</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->product_type}}
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
        <div id="edit--director-details" class="d-none">
            @include('vendors.partials.update-director-details')
        </div>
    </div> <!-- row end here-->
    
</div>

