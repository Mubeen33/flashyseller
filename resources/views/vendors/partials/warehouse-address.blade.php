<div class="row">
    
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9 pl-0">
                <h3 class="pl-1">
                       <i class="feather icon-user"></i> WireHouse Address
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
                    
                    <h3 style="cursor: pointer;" title="Edit Business Address" id="btn-edit-wireHouseAddress-details">
                        <i class="feather text-primar icon-edit"></i>
                    </h3>
                </div>
            </div>
        </div>
    </div> <!-- row end here-->
    <div class="col-md-12 border border-primary"></div>


    <div class="col-md-12">
        <!--Show seller Details-->
        <div id="show--wireHouseAddress-details">
            <div class="card">
                <div class="card-body pr-0 pl-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row pt-0">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Address</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->waddress}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>Street</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->wstreet}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>City</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->wcity}}
                                        </div>
                                    </div>
                                    
                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3 ">
                                            <strong>State</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->wstate}}
                                        </div>
                                    </div>

                                    <div class="row pt-1">
                                        <div class="col-md-3 col-3">
                                            <strong>Sub Rub</strong>
                                        </div>
                                        <div class="col-md-9 col-9 p-0">
                                            {{$data->wsubrub}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Postal Code</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->wzip_code}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 pt-1">
                                    <div class="row">
                                        <div class="col-md-3 col-3">
                                            <strong>Country</strong>
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            {{$data->wcountry}}
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
        <div id="edit--wireHouseAddress-details" class="d-none">
            @include('vendors.partials.update-wirehouse-address')
        </div>
    </div> <!-- row end here-->
    
</div>

