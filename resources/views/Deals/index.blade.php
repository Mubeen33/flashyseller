@extends('layouts.master')
@section('page-title','Deals List')

@push('styles')
<style type="text/css">
    #searchKey__,
    #selected_row_per_page{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">My Deals</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Deals List</h4></div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Created at</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody id="render__data">
                                                @foreach($data as $key=>$content)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $content->get_product->title }}</td>
                                                    <td>{{ $content->price }}</td>
                                                    <td>{{ $content->quantity }}</td>
                                                    <td>{{ $content->start_time }}</td>
                                                    <td>{{ $content->end_time }}</td>
                                                    <td>{{ $content->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        @if($content->status == 0)
                                                        <span class="badge badge-danger">Pending</span>
                                                        @else
                                                        <span class="badge badge-success">Approved</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div class="dropdown">
                                                                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                                                    @if($content->status == 0)
                                                                    <a class="dropdown-item" href="{{ route('vendor.deals.edit', Crypt::encrypt($content->id)) }}">Edit</a>
                                                                    <a onclick="return confirm('Are you sure?')" class="dropdown-item" href="{{ route('vendor.deals.deleteDeal', Crypt::encrypt($content->id)) }}">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection