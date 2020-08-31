@extends('layouts.master')
@section('page-title','Dashboard')

@push('styles')
<style type="text/css">
   .auto-complete-wrapper ul{
      padding: 0;
      margin: 0;
      outline: 0;
      list-style: none;
      margin-top: 5px
   }
   .auto-complete-wrapper ul li{
      padding: 2px 10px;
      border:1px solid #ddd;
      margin-bottom: 2px;
      cursor: pointer;
   }
   .auto-complete-wrapper ul li p{
      margin-top: 2px
   }
   .auto-complete-wrapper ul li:hover{
      border:1px solid #7367F0;
   }
</style>
@endpush

@section('breadcrumbs')                            
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Deal Create</li>
@endsection

@section('content')
<div class="content-body">
   @include('msg.msg')
   <div class="row" id="basic-table">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Add New Deal</h4>
            </div>
            <div class="card-content">
               <div class="card-body">
                  <div class="row">
                     <div class="col-12">
                        <form id="dealCreatingForm" action="{{ route('vendor.deals.store') }}" method="post">
                           @csrf
                           <div class="card">
                              <div class="card-body pr-0 pl-0">
                                 <div class="row">
                                    <div class="col-12">
                                       <div class="form-group">
                                          <label>Product</label>
                                          <input id="searchProductInput_" type="text" name="product" class="form-control" placeholder="Search product" value="{{old('product')}}">
                                          <input id="set__productID" type="hidden" name="product_id" class="form-control">
                                          <div id="render__data">
                                             @include('Deals.partials.auto-complete')
                                          </div>
                                       </div>

                                       <div class="row">
                                             <div class="col-lg-6">
                                                <div class="form-group">
                                                   <label>Start Date</label>
                                                   <input type="date" name="start_date" class="form-control" value="{{old('start_date')}}">
                                                </div>
                                             </div>
                                             <div class="col-lg-6">
                                                <div class="form-group">
                                                   <label>End Date</label>
                                                   <input type="date" name="end_date" class="form-control" value="{{old('end_date')}}">
                                                </div>
                                             </div>
                                       </div>


                                       <div>
                                          <div class="row">
                                                <div class="col-lg-6">
                                                   <div class="form-group">
                                                      <label>Price</label>
                                                      <input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="Deal Price">
                                                   </div>
                                                </div>
                                                <div class="col-lg-6">
                                                   <div class="form-group">
                                                      <label>Quantity</label>
                                                      <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}" placeholder="Deal Quantity">
                                                   </div>
                                                </div>
                                          </div>
                                       </div>
                                       
                                       
                                       <button class="btn btn-primary" type="submit" name="update">Add</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <!-- card-body end here -->
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@push('scritps')  
   <script type="text/javascript" src="{{ asset('assets/js/deals.js') }}"></script>
@endpush