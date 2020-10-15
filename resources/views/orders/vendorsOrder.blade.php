@extends('layouts.master')

@section('content')
@include('msg.msg')
    <!-- Basic tabs start -->
    <section id="basic-tabs-components">
        <ul class="list-group list-group-horizontal-sm list-tab"  role="tablist" style="text-decoration:none; list-style:none; border-radius:5px;">
            <li>
                <a class="list-group-item order-pill active" id="home-tab" data-toggle="tab" href="#orders" aria-controls="home" role="tab" aria-selected="true">
                    Orders
                </a>
            </li>
            <li>
                <a class="list-group-item order-pill" id="profile-tab" data-toggle="tab" href="#drafts" aria-controls="profile" role="tab" aria-selected="false">Draft Shipment</a>
            </li>
            <li>
                <a class="list-group-item order-pill" id="about-tab" data-toggle="tab" href="#confrim" aria-controls="about" role="tab" aria-selected="false">Ready For Collection</a>
            </li>
            <li>
                <a class="list-group-item order-pill" id="about-tab" data-toggle="tab" href="#shipped" aria-controls="about" role="tab" aria-selected="false">Orders InProgress</a>
            </li>
            {{-- <li>
                <a class="list-group-item order-pill" id="about-tab" data-toggle="tab" href="#shipped" aria-controls="about" role="tab" aria-selected="false">pending</a>
            </li> --}}
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="orders" aria-labelledby="home-tab" role="tabpanel">
                  <div class="table-responsive">
                      <table class="table mb-0 table-bg">
                           <thead>
                                <tr class="table-head">
                                    <td width="15%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Due Date
                                    </td>
                                    <td width="25%">
                                        Product Title
                                    </td>
                                    <td width="25%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Qty Required
                                    </td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <!-- filters for table -->
                                <tr>
                                    <td width="15%">
                                        <select class="input-one">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="sku">
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- End filters -->
                                <!-- start List -->        
                    @foreach($data as $key=>$content)
                        @foreach($content as $order)
                            
                        @endforeach     
                                <tr style="background: aliceblue;">
                                    <td width="15%">
                                       Date : {{ $order->created_at }}
                                    </td>
                                    <td width="25%" colspan="1">Order Id# {{ $order->order_id }}</td>
                                    <td width="10%" colspan="3">Order Total : {{ $order->grand_total }}</td>
                                        <td width="15%">
                                            <div class="dropdown">
                                                    <button class="btn btn-warning btn-sm"><a href="{{ route('vendor.orderAction.post', [encrypt($key), 'process']) }}" style="color:#fff">Ready To Collect</a></button>
                                                </div>
                                            </div>
                                        </td>   
                                </tr>
                            @foreach($content as $order)    
                                <tr>
                                    <td width="15%">
                                        {{ $order->created_at->toDateString() }}
                                    </td>
                                    <td width="25%">
                                         <img src="{{ $order->product_image }}" width="40"  height="40" /><font size="2">  {{ $order->product_name }}  </font>
                                    </td>
                                    <td width="25%">
                                        @php
                                            $sku = (App\Product::where('id',$order->product_id)->value('sku'));
                                        @endphp
                                        {{ $sku }}
                                    </td>
                                    <td width="10%">{{ $order->product_id }}</td>
                                    <td width="10%">
                                        {{ $order->qty }}   
                                    </td>
                                    <td width="15%">
                                        @if($order->status !== "Canceled")    
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>    
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" n="1" id="cancle-order" href="{{ Route('vendor.orders.order-cancelled',encrypt($order->id)) }}">
                                                        Cancle
                                                    </a>
                                                </div>
                                        @else
                                            <div class="chip chip-danger">
                                                <div class="chip-body">
                                                    <div class="chip-text">Order Cancelled</div>
                                                </div>
                                            </div>
                                        @endif    
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach            
                                <!-- end list -->
                            </tbody>
                      </table>
                  </div>
            </div>
            <div class="tab-pane" id="drafts" aria-labelledby="profile-tab" role="tabpanel">        
                <div class="table-responsive">
                      <table class="table table-striped mb-0 table-bg">
                           <thead>
                                <tr class="table-head">
                                    <td width="15%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Due Date
                                    </td>
                                    <td width="25%">
                                        Product Title
                                    </td>
                                    <td width="25%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Qty Required
                                    </td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody class="table-body" id="ordersinDraft">
                                <!-- filters for table -->
                                <tr>
                                    <td width="15%">
                                        <select class="input-one">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="sku">
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                        
                                @include('orders.partials.draft-shippments')
                                    
                            </tbody>
                      </table>
                </div>
            </div>
            <div class="tab-pane" id="confrim" aria-labelledby="about-tab" role="tabpanel">
                <div class="table-responsive">
                      <table class="table table-striped mb-0 table-bg">
                           <thead>
                                <tr class="table-head">
                                    <td width="15%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Due Date
                                    </td>
                                    <td width="25%">
                                        Product Title
                                    </td>
                                    <td width="25%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Qty Required
                                    </td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody class="table-body" id="ordershippmentconfirm">
                                <!-- filters for table -->
                                <tr>
                                    <td width="15%">
                                        <select class="input-one">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="sku">
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- End filters -->
                                <!-- start List -->
                               @include('orders.partials.confirm-shippments')
                                <!-- end list -->
                            </tbody>
                      </table>
                </div>
            </div>
            <div class="tab-pane" id="shipped" role="tabpanel" aria-labelledby="dropdown31-tab" aria-expanded="false">
                <div class="table-responsive">
                      <table class="table table-striped mb-0 table-bg">
                           <thead>
                                <tr class="table-head">
                                    <td width="15%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Due Date
                                    </td>
                                    <td width="25%">
                                        Product Title
                                    </td>
                                    <td width="25%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Qty Required
                                    </td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody class="table-body" id="ordershipped">
                                <!-- filters for table -->
                                <tr>
                                    <td width="15%">
                                        <select class="input-one">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="sku">
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- End filters -->
                                <!-- start List -->
                               @include('orders.partials.shipped-shippments')
                                <!-- end list -->
                            </tbody>
                      </table>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript" src="{{ asset('app-assets/js/core/libraries/jquery.min.js') }}"></script>       
<script type="text/javascript">        
$(function(){

    draftShippments();
    confirmShippments();
    shippedShippments();
});

function draftShippments(){

    $.ajax({

            type : "get",
            url  : '{{ Route('vendor.orders.draft-shippments-orders') }}',
            success:function(data){

                $('#ordersinDraft').append(data)
            }

    });
}

function confirmShippments(){

    $.ajax({

            type : "get",
            url  : '{{ Route('vendor.orders.confirm-shippments-orders') }}',
            success:function(data){

                $('#ordershippmentconfirm').append(data)
            }

    });
}
function shippedShippments(){

    $.ajax({

            type : "get",
            url  : '{{ Route('vendor.orders.shipped-shippments-orders') }}',
            success:function(data){

                $('#ordershipped').append(data)
            }

    });
}
</script>  
@endsection