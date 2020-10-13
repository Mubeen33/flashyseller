@extends('layouts.master')
@section('page-title','Orders')

@push('styles')
<style type="text/css">
    #searchKey__,
    #selected_row_per_page,
    #hidden__status{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
    a{
        color: #fff;
        text-decoration: none;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Orders</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Orders List</h4></div>
                                {{-- <div>
                                    <select id="hidden__status" title="Sort By Status">
                                        <option value="" selected>Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Canceled">Canceled</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                    <input type="text" id="searchKey__" placeholder="Search">
                                    <select id="selected_row_per_page" title="Display row per page">
                                        <option value="5" selected="1">Show 5</option>
                                        <option value="10">Show 10</option>
                                        <option value="15">Show 15</option>
                                        <option value="20">Show 20</option>
                                        <option value="25">Show 25</option>
                                        <option value="30">Show 30</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="8%">Order Token</th>
                                                    <th width=8%>  Order ID#</th>
                                                    <th width="8%">Product ID#</th>
                                                    <th width="8%">Image</th>
                                                    <th width="8%">Product</th>
                                                    <th width="8%" title="Market Price">Price</th>
                                                    <th width="8%" title="Selling Price">Quantity</th>
                                                    <th width="8%">Order Price</th>
                                                    <th width="8%">Shipped</th>
                                                    <th width="8%">Status</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $shipped = "No";
                        @endphp
                    @foreach($data as $key=>$content)
                        @foreach($content as $order)
                            @if($order->shipped == "Yes")
                                @php
                                    $shipped = "Yes";
                                @endphp
                            @endif
                        @endforeach   
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div>
                                    <h5>Order Date : {{ $order->created_at }}</h4>
                                </div>
                                <div>
                                    <h5 class="card-title">Orders Id# {{ $key }} </h4>
                                </div>
                                <div>
                                    <h5>Total Amount : R{{ $order->grand_total }}</h4>
                                </div>
                                <div>
                                    @if($shipped !== "Yes")
                                        <button class="btn btn-warning"><b><a href="{{ route('vendor.orderAction.post', [encrypt($key), 'Shipped']) }}">Ready To Collect</a></b></button>
                                    @endif    
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            @foreach($content as $order)    
                                                <tr>
                                                    <td width="8%">{{ $order->order_token }}</td>
                                                    <td width="8%">{{ $order->id }}</td>
                                                    <td width="8%">{{ $order->product_id }}</td>
                                                    <td width="8%"><img src="{{ $order->product_image }}" width="30" height="30"></td>
                                                    <td width="8%">{{ $order->product_name }}</td>
                                                    <td width="8%"><strong>R{{ $order->product_price }}</strong></td>
                                                    <td width="8%">{{ $order->qty }}</td>
                                                    <td width="8%"><strong>R{{ $order->order_price }}</strong></td>
                                                    @if(!empty($order->shipped))
                                                        <td width="8%">
                                                            <div class="chip chip-info">
                                                                <div class="chip-body">
                                                                    <div class="chip-text">{{ $order->shipped }}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @else
                                                        <td width="8%">
                                                            <div class="chip chip-danger">
                                                                <div class="chip-body">
                                                                    <div class="chip-text">No</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td width="8%">
                                                        <div class="chip chip-secondary">
                                                            <div class="chip-body">
                                                                <div class="chip-text">{{ $order->status }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @if($order->status == "Inprogress" && $order->shipped !== "Yes")    
                                                    <td width="8%"><button class="btn btn-dark btn-sm"><a href="{{ Route('vendor.orders.order-cancelled',encrypt($order->id)) }}" onclick="return confirm('Are you sure to Cancel this order?')">Cancel</a></button></td>
                                                @elseif($order->status == "Inprogress" && $order->shipped == "Yes")
                                                    <td width="8%"><div class="chip chip-info">
                                                            <div class="chip-body">
                                                                <div class="chip-text">Order Shipped</div>
                                                            </div>
                                                        </div>
                                                    </td> 
                                                @elseif($order->status == "Completed")
                                                    <td width="8%"><div class="chip chip-success">
                                                            <div class="chip-body">
                                                                <div class="chip-text">Order Completed</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @elseif($order->status == "Canceled")
                                                    <td width="8%"><div class="chip chip-danger">
                                                            <div class="chip-body">
                                                                <div class="chip-text">Order Cancelled</div>
                                                            </div>
                                                        </div>
                                                    </td>       
                                                @endif    
                                                </tr>
                                            @endforeach    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
<script type="text/javascript">
    //if change status
    $("#hidden__status").on('change', function(){
        let action_url = $("#hidden__action_url").val()
        let searchKey = $("#searchKey__").val()
        let pageNumber = 1;
        let sort_by = $("#hidden__sort_by").val()
        let sorting_order = $("#hidden__sorting_order").val()
        let hidden__status = $(this).val()
        let row_per_page = $("#selected_row_per_page").val()
        let hidden__id = $("#hidden__id").val()
        fetch_paginate_data(action_url, pageNumber, searchKey, sort_by, sorting_order, hidden__status, row_per_page, hidden__id);
    })
</script>
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush