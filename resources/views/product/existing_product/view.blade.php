@extends('layouts.master')
@section('page-title','Existing Product')

@push('styles')
<style type="text/css">
    input[type=number]{
        width: 100%
    }
    .border-danger-alert{
        border: 1px solid red
    }
</style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">View Existing Product</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between"></div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                                            <div style="width: 90%;max-height: 250px;padding: 0px 15px 15px 15px;margin-bottom: 30px">
                                                @if($data->get_product_variations && $data->get_product_variations->variant_image !== NULL)
                                                    <img src="{{$data->get_product_variations->variant_image}}" width='100%' height='100%' alt="" type-of='Variant Image'>
                                                    @else
                                                    
                                                    <?php
                                                        $product_image = (\App\ProductMedia::where('image_id', $data->get_product->image_id)->first());
                                                        if ($product_image) {
                                                            echo "<img src='".$product_image->image."' width='100%' height='100%' alt='' type-of='Product Image'>";
                                                        }else{
                                                            echo "The product have no images";
                                                        }
                                                    ?>
                                                    
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-7 col-sm-12">
                                            <h4>
                                                {{$data->get_product->title}}
                                                @if($data->get_product_variations)
                                                    {{' | '.$data->get_product_variations->first_variation_value}}
                                                    @if($data->get_product_variations->second_variation_value !== NULL)
                                                    {{' - '.$data->get_product_variations->second_variation_value}}
                                                    @endif
                                                @endif
                                            </h4>

                                            <p>
                                                <?php echo $data->get_product->description; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form id="save_existing_product_from" action="{{ route('vendor.saveExistingProduct.post', encrypt($data->id)) }}" method="POST">
                                            @csrf

                                            <table class="table table-bordered" style="text-align: left !important;">
                                                <thead>
                                                    <tr>
                                                        <th>Quantity</th>
                                                        <th>Market Price</th>
                                                        <th>Price</th>
                                                        <th>Dispatched Days</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="number" name="quantity" placeholder="Quantity" class="form-control" value="{{ old('quantity') }}">
                                                            <small class="place-error--msg text-danger"></small>
                                                        </td>
                                                        <td>
                                                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="number" name="market_price" placeholder="Market Price" class="form-control" value="{{ old('market_price') }}">
                                                            <small class="place-error--msg text-danger"></small>
                                                        </td>
                                                        <td>
                                                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="number" name="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
                                                            <small class="place-error--msg text-danger"></small>
                                                        </td>
                                                        <td>
                                                            <input is-required='true' onclick="removeErrorLevels($(this), 'input')" type="number" name="dispatched_days" placeholder="Dispatched Days" class="form-control" value="{{ old('dispatched_days') }}">
                                                            <small class="place-error--msg text-danger"></small>
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning">Save</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
@endsection


@push('scripts')
<script type="text/javascript">
    $("#save_existing_product_from").on('submit', function(e){
        formClientSideValidation(e, "save_existing_product_from", 'no');
    })
</script>
<script type="text/javascript" src="{{ asset('assets/js/general-form-submit.js') }}"></script>
@endpush