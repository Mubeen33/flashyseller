@extends('layouts.master')
@section('page-title','Add Product')
@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Add Product</li>
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/wizard.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link href="{{ asset('app-assets/vendors/css/jquery.tagsinput-revisited.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/addproduct.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/product_category.css')}}">
	<script src="https://cdn.tiny.cloud/1/engqutrfxcqjgr0hu2tcnoxmuj8hanintsrrda7vuc8sbtup/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/toastr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css')}}">
	
	<?php $today=date('YmdHi');
	$startDate=date('YmdHi', strtotime('2012-03-14 09:06:00'));
	$range=$today - $startDate;
	$prod_img_id=rand(0, $range);
	?>
<style>
	
	span.select2.select2-container.select2-container--default {
    min-width: 100% !important;         
   
}
</style>
	
<div class="content-body">
	<div class="container-fluid" style="width: 74% !important;">
            @if(session('msg'))
                  {!! session('msg') !!}
				@endif
				
				<input type="hidden" id="currentProductID" name="currentProductID" value="" >      
			  <form id="titlFrm" action="" method="post" enctype="multipart/form-data" >
				@csrf
				<input type="hidden" name="image_id" value="{{$prod_img_id}}">      
					  <!-- end Photos -->
					  <!-- Card video -->
					  
					  <!-- end card -->
					  <!--Listing Details -->        
					  <div class="card card-radiouse">
						<div class="card-header">
                            <h4 class="card-title" >Listing Details</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a id="titleCollap" data-toggle="collapse" href="#collapsetitle" role="button" aria-expanded="false" aria-controls="collapsetitle"><i class="feather icon-chevron-down"></i></a></li>
                                    
                                </ul>
                            </div>
							
                        </div>
						  <div class="card-content collapse show" id="collapsetitle" style="">
						
						  <div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<p class="text-gray-lighter">
										Include keywords that buyers would use to search for your item.
									</p>
								</div>	
							</div>
							        
									 <div class="row">
										
										 <div class="col-sm-12"> 
											<div class="mb-xs-2 strong"> Title <span class="text-gray-lightest">*</span> <span> </span> </div>
											<div id="titleMsg" class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
											 <input type="text" class="form-control" name="title" autocomplete="off" required/>
											 <p class="text-smaller text-gray-lighter">
												To ensure customers can find your product include the brand, product name and most important information.											</p>
										 </div>
									
									 </div>
									 
									 <div class="row mt-1">
										
										 <div class="col-sm-6"> 
											<div class="mb-xs-2 strong"> SKU <span class="text-gray-lightest" style="font-size: x-small;">( Optional )</span> </div>
											<div id="skuMsg" class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
											<input type="text" class="form-control" name="sku" placeholder="SKU" autocomplete="off"/>
											 <p class="text-smaller text-gray-lighter">
												SKUs are for your use only — buyers won’t see them. 
											</p>
											

										</div>
										 <div class="col-sm-6 ">
											<div class="mb-xs-2 strong">Brand <span class="text-gray-lightest">*</span> </div>
											<div id="brandMsg" class="emptymsgs" style="color: rgb(228, 88, 88);"></div>
											
												<select class="select2 form-control" name="brand" id="brandoption" autocomplete="off" required>
													<option value="">Select Brand</option>
													@foreach($brandsList as $brands)
                                                    <option value="{{encrypt($brands->id)}}">{{$brands->name}}</option>
													@endforeach
													
												</select>
												<p class="text-smaller text-gray-lighter">Select a brand that's related with your product.</p>
											 
											
											
											
										</div>
									 </div>
									 <div class="row" >
										
											<div class="col-lg-12" style="text-align: right; margin-top: 2%;">
												<button id="titleBtn"  type="submit" class="btn btn-primary waves-effect waves-light">Next</button>
												<a href="javascript:void(0)" onclick="cancelListing()"   class="btn btn-danger waves-effect waves-light">Cancel</a>
											</div>
										
									</div>
									
						  </div>
						  </div>
					  </div>
					</form>
					  <div class="card card-radiouse"  id="category-div" style="display: none;">
						<div class="card-header" >
                            <h4 class="card-title">Category And Custom Fields</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a id="catCollap" data-toggle="collapse" href="#collapsecat" role="button" aria-expanded="false" aria-controls="collapsecat"><i class="feather icon-chevron-down"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
						<form id="categoryFrm" action="" method="post" enctype="multipart/form-data" >
							@csrf
						<div class="card-content collapse show" id="collapsecat" >       
						
						  <div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<p class="text-gray-lighter">
												Select a category that related with your project.
											</p>
										</div>	
									</div>
									 
									 <div class="row" style="margin-bottom: 3%;">
										
										 <div class="col-lg-12"> <br />
											<div id="catMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
										   <div class="row resources" >
											<div   id="resource-slider" >
												<a href="javascript:void(0)" class='arrow prev catBtn waves-effect waves-light'></a>
												<a href="javascript:void(0)" class='arrow next catBtn  waves-effect waves-light' id="nextslider"></a>
												<div class=" resource-slider-frame" id="categoryDivs">
													@include('product.partials.category-select')
												   
												</div>
								            </div>
								            </div>
										 </div>
									 </div>
									 
									 <div class="row breadcrumbs-top mb-2" id="breadcurmsdiv" style="display: none;">
										<div class="col-12">
										 
											<div class="breadcrumb-wrapper col-12" style="    border: 1px solid #D9D9D9;">
												<h6 class="content-header-title float-left " style="margin-top: 0.6rem !important;">Current Selection: </h6>
												<ol class="breadcrumb nextbrad" style="    border-left: 0px solid #D6DCE1;" >
													
													
												</ol>
											</div>
										</div>
									</div>
									
									<div id="render__customfields__data">
										@include('product.partials.auto-customfields')
									</div>
									  
									 <div class="row" >
										<div class="col-lg-12" style="text-align: right; margin-top: 2%;">
											<button id="categoryBtn" type="submit" style="display: none;"  class="btn btn-primary waves-effect waves-light">Next</button>
											<a href="javascript:void(0)" onclick="cancelListing()"   class="btn btn-danger waves-effect waves-light">Cancel</a>
										</div>
									</div>
						  </div>
						  </div>
						</form>
					  </div>
					
					  <!-- End Listing Details -->

					  <div class="card form-group card-radiouse" id="imageDiv" style="display: none;">
						<div class="card-header" >
                            <h4 class="card-title mb-xs-1 strong">Photos</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a id="imgCollap" data-toggle="collapse" href="#collapseimg" role="button" aria-expanded="false" aria-controls="collapseimg"><i class="feather icon-chevron-down"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
						<div class="card-content collapse show" id="collapseimg" style="">
						<div class="card-body">
							
						   <div class="row">
							   <div class="col-lg-12">
								   
								   <p class="text-gray-lighter">Add as many as you can so buyers can see every detail<small>(Use up to ten photos to show your item's most important qualities).</small> </p>	
								   <label class="text-smaller text-gray-lighte"> Tips: </label>
							   </div>
						   </div>
						   <div class="row">
							   <div  class="col-lg-3 col-md-3">
								   <ul class="text-smaller text-gray-lighter">
									   <li>Use natural light and no flash. </li>
									   <li>Include a common object for scale. </li>
									   <li>Show the item being held, worn, or used. </li>
									   <li>Shoot against a clean, simple background. </li>
								   </ul>
							   </div>
				                 
							   <div class="col-lg-9  ">
							   <div class="row">
							   <div class="col-lg-4 ">
								
								<div id="dropzon_file_1"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>

								   <form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
									   method="POST"  
									   enctype="multipart/form-data" 
									   class="dropzone dropzone-area"
									   id="dpz-single-file-p1"
								   >
								   @csrf
									   <input type="hidden" name="fileDropzone" />
								   </form>
							   </div>
							   <div class="col-lg-4 ">
								<form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
									method="POST"  
									enctype="multipart/form-data" 
									class="dropzone dropzone-area" 
									id="dpz-single-file-p2"
								>  
								@csrf
									<input type="hidden" name="fileDropzone" />
								</form>
							   </div>
							   <div class="col-lg-4">
								<form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
									method="POST"  
									enctype="multipart/form-data" 
									class="dropzone dropzone-area" 
									id="dpz-single-file-p3"
								>  
								@csrf
									<input type="hidden" name="fileDropzone" />
								</form>
						    	</div>  
								<div class="col-lg-4 mt-2">
									<form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
										method="POST"  
										enctype="multipart/form-data" 
										class="dropzone dropzone-area" 
										id="dpz-single-file-p4" 
									>  
									@csrf
										<input type="hidden" name="fileDropzone" />
									</form>
								</div>  
								<div class="col-lg-4 mt-2">
									<form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
										method="POST"  
										enctype="multipart/form-data" 
										class="dropzone dropzone-area" 
										id="dpz-single-file-p5"
									>  
									@csrf
										<input type="hidden" name="fileDropzone" />
									</form> 
								</div>
								<div class="col-lg-4 mt-2">
									<form action="{{url('vendor/add-product-images')}}/{{$prod_img_id}}" 
										method="POST"  
										enctype="multipart/form-data" 
										class="dropzone dropzone-area" 
										id="dpz-single-file-p6"
									>  
									@csrf
										<input type="hidden" name="fileDropzone" />
									</form> 
								</div>
							   </div>
							   </div>
							   
							   
							   
							   
							   </div>  
							 
								   <div class="row mt-3">
									<div class="col-lg-12">
								   <div class="text-right mb-20" >
									<a href="javascript:void(0)" onclick="afterimg()" id="finishProduct" style=" margin-bottom: 2%;"  class="btn btn-primary waves-effect waves-light">Next</a>
									<a href="javascript:void(0)" onclick="cancelListing()" style="margin-right: 1% !important; margin-bottom: 2%;"   class="btn btn-danger waves-effect waves-light">Cancel</a>
				
								</div>  			
								</div>  			
								</div>  			
						   </div>
						   </div>
						</div>
					 
				<div>	       
				
					  <!-- Inventory and pricing  -->
					  <form id="choice_form" action="" method="post" enctype="multipart/form-data" >
					  <div class="card card-radiouse" id="inventoryDiv" style="display: none;">
						<div class="card-header" >
                            <h4 class="card-title">Inventory and Dimension</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a id="invCollap" data-toggle="collapse" href="#collapseinv" role="button" aria-expanded="false" aria-controls="collapseinv"><i class="feather icon-chevron-down"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
						<div class="card-content collapse show" id="collapseinv" style="">
						  <div class="card-body" style="padding-top: 1.3rem !important;">
							
						  
						<div class="row">
							
							<div class="col-lg-3">
								<div class="mb-xs-2 strong"> Width </div>
								<p class="text-smaller text-gray-lighter">
									Width description 
								</p>
								<div id="widthMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                <input type="text" id="width" class="form-control" name="width"  placeholder="Width" autocomplete="off" required/>
							</div>
							<div class="col-lg-3">
								<div class="mb-xs-2 strong"> Height  </div>
								<p class="text-smaller text-gray-lighter">
									Height description 
								</p>
								<div id="heigtMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
								<input type="text" id="hieght" class="form-control" name="hieght" placeholder="Height" autocomplete="off" required/>
							</div>
							<div class="col-lg-3">
								<div class="mb-xs-2 strong"> Length  </div>
								<p class="text-smaller text-gray-lighter">
									Length description 
								</p>
								<div id="lengthMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                <input type="text" class="form-control" id="length" name="length" placeholder="Length" autocomplete="off" required/>
							</div>
							<div class="col-lg-3">
								<div class="mb-xs-2 strong">Product Weight </div>
								<p class="text-smaller text-gray-lighter">
									Product Weight description 
								</p>
								<div id="weightMsg"   class="emptymsgs" style="color: rgb(228, 88, 88); "></div>
                                <input type="text" class="form-control" id="weight" name="weight"  placeholder="Weight" autocomplete="off" required/>
							</div>
						</div>
					
					
						   <div class="text-right mb-20" style="margin-top: 2.5rem;">
					         <a id="varientBtn" style=" margin-bottom: 2%; color: white;"  class="btn btn-primary waves-effect waves-light">Next</a>
							 <a href="javascript:void(0)" onclick="cancelListing()" style="margin-right: 1% !important;     margin-bottom: 2%;"   class="btn btn-danger waves-effect waves-light">Cancel</a>

						    </div>
						 
						  
						  </div>
						  </div>
					  </div>
				
					{{-- </form> 
					
					<form id="variations_form " action="" method="post"   enctype="multipart/form-data" > --}}

					<div class="card card-radiouse" id="addvariationsdiv" style="display: none;">
						<div class="card-header" >
                            <h4 class="card-title">Variations</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a id="verCollap" data-toggle="collapse" href="#collapsever" role="button" aria-expanded="false" aria-controls="collapsever"><i class="feather icon-chevron-down"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
						<div class="card-content collapse show" id="collapsever" style="">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-9">
										
									   <p class="text-gray-lighter">Add available options like color or size. Buyers will choose from these during checkout.</p>
									</div>
								</div>
								<div class="row">
									   <div class="col-lg-10">
										  <button type="button" id="addVariantButton" onclick="openVariant()" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
											  Add Variations
										  </button>
										  
									  </div>
									  
								</div>
								<div style="display: none;" id="variant-card">
								<h5 class="modal-title">Add variations</h5>
	
								  <div class="col-md-12 mx-0 px-0" id="loadSecondVariationOptionsData"></div>
	
								<div class="row" id="render__variations__data">
									<div class="col-lg-12">
										<select class="form-control select2" name="variation_name[]" onchange="add_more_customer_choice_option()" id="variation" multiple="multiple" >
											<option>Choose Variation Type</option>
											<optgroup label="Variation Type">
												@foreach($variationList as $variation)
												<option value="{{$variation->variation_name}}">
													{{$variation->variation_name}}
												</option>
												@endforeach
											</optgroup>
										</select>
									</div>
								</div>
							</div>
						 
					</div>
					<div  id="customer_options" style="display: none;">
							<div class="card-body" id="customer_choices">

							</div>
				         <div class="card-body" id="customer_choice_options">

						 </div>
						 
				        
						 	<div class="text-right mb-20" style="margin-top: 2.5rem;">
							<button id="inventoryBtn" style=" margin-bottom: 2%;" type="submit" class="btn btn-primary waves-effect waves-light">Next</button>
							<a href="javascript:void(0)" onclick="cancelListing()" style="margin-right: 1% !important;     margin-bottom: 2%;"   class="btn btn-danger waves-effect waves-light">Cancel</a>

						</div>
			       </div>
			     </div>
			     </div>
				
				  <!-- End Inventory and pricing  -->
				</form> 
      		
      <!-- Photos -->
	  <div class="card card-radiouse" id="description-card" style="display: none">
		<div class="card-header">
			<h4 class="card-title">Description</h4>
			<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
			<div class="heading-elements">
				<ul class="list-inline mb-0">
					<li><a id="desCollap" data-toggle="collapse" href="#collapsedes" role="button" aria-expanded="false" aria-controls="collapsedes"><i class="feather icon-chevron-down"></i></a></li>
					
				</ul>
			</div>
		</div>
		<div class="card-content collapse show" id="collapsedes" style="">

		<div class="card-body">
			  <div class="row">
				  <div class="col-lg-12">
					  <div class="row">
							  
							  <div class="col-lg-12">
								
								  <div id="descMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></div>
								  <p class="text-smaller">
									  Start with a brief overview that describes your item’s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
							  Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.
								  </p>
								  {{-- <textarea class="form-control textarea" rows="10" name="description"></textarea> --}}
								  <textarea  name="description" id="editortiny" autocomplete="off" required></textarea>

							  </div>
					  </div>
					  </div>
					  <div class="col-lg-12 mt-5">
					  <div class="row">
							  
							  <div class="col-lg-12">
								  <label class="mb-xs-1 strong">Whats in the box</label> <br/>
								  <div id="boxMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></div>
								  <p class="text-smaller">
									  Start with a brief overview that describes your item’s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
							  Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.
								  </p>
								  {{-- <textarea class="form-control textarea" rows="10" name="description"></textarea> --}}
								  <textarea rows="6" style="width: 100%;"  name="whats_in_box" id="whats_in_box" placeholder="Explain whats in th box of this product" autocomplete="off" required></textarea>

							  </div>
					  </div>
					  </div>
					  <div class="col-lg-12">
					  <div class="row" >
							  <div class="col-lg-12" style="text-align: right; margin-top: 2%;">
								  <a id="descriptionBtn"  href="javascript:void(0)" onclick="updatedesc('descriptionBtn')"   class="btn btn-primary waves-effect waves-light">Next</a>
								  <a href="javascript:void(0)" onclick="cancelListing()"   class="btn btn-danger waves-effect waves-light">Cancel</a>

							  </div>
					 </div>
					 </div>
			  </div>
	  </div>
	  </div>
	</div>
	<!--end description portion -->

	    </div>
     </div>
  </div>
</div>
@endsection
@section('script')
  <script src="{{ asset('app-assets/vendors/js/jquery.tagsinput-revisited.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/custom-dropzone.js')}}"></script>
  <!-- <script src="{{ asset('app-assets/js/scripts/extensions/variants.js')}}"></script> -->
  <!-- <script src="{{ asset('app-assets/js/scripts/extensions/getVariantOptions.js')}}"></script> -->
  <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/add-new-products-1.js') }}"></script>
  <script src="{{ asset('app-assets/js/scripts/extensions/toastr.js')}}"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  

<script type="text/javascript">

</script>
  <script type="text/javascript">

  $("#render__data").hide();
  $("#render__variations__data22").hide();

	
	// Disable Variant Button
	$("#addVariantButton").prop('disabled', true);
	$("#addVariantButton").attr('title', 'Please Select a Category First');

    $("#render__data").on('click', "ul li", function(){
        let categoryID = $(this).attr('getCategoryId');
        let getTitle = $(this).attr('gettitle');
        
        $("#category_id").val(categoryID);
        $("#category_search").val(getTitle);
        $("#render__data .auto-complete-wrapper").html('');

		//getCustomFields(categoryID);
       //getWarranty(categoryID);
		$("#addVariantButton").prop('disabled', false);
		let category_id = $("#category_id").val();
		
    });

    // get custom fields of selected category

    function getCustomFields(categoryID){

        if (categoryID !== "") {
            $.ajax({
                url:"/vendor/ajax-get-category-customfields/fetch?categoryId="+categoryID,
                method:'GET',
                cache:false,
                success:function(response){
                    $("#render__customfields__data").html(response);
                   
                },
            });
        
        }else{
            return false;
        }
    }

    


var i = 0;
      function add_more_customer_choice_option(){

        $('#customer_options').css('display','');
        $('#customer_choices').html(null);

        $("select#variation :selected").each(function() {

          vari = $(this).val();

            $('#customer_choices').append('<div class="row mb-3"><div class="col-8 col-md-3 order-1 order-md-0"><input type="hidden" name="choice_no[]" value="'+i+'"><input type="text" class="form-control" name="choice_no_'+i+'" value="'+vari+'" readonly=""></div><div class="col-12 col-md-7 col-xl-8 order-3 order-md-0 mt-2 mt-md-0"><input type="text" class="form-control tagsInput" data-role="tagsinput" name="choice_options_'+i+'[]" placeholder="Enter choice values"></div><div class="col-4 col-xl-1 col-md-2 order-2 order-md-0 text-right"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div></div>');
             i++;
            $('.tagsInput').tagsInput('items');
			update_sku('remove');
        });    
      }
      function update_sku(check=null){
		  if(check=='remove'){
			$('#customer_choice_options').html('');
		  }else{
            $.ajax({
           type:"POST",
           url:'{{ route('vendor.products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data){
          
             $('#customer_choice_options').html(data);
             
           }
         });
		  }
      }

      function delete_row(em){
        $(em).closest('.row').remove();
        update_sku();
      }
      // 
      $("#variation").select2({
          maximumSelectionLength: 2
      });
  </script>

   

<script>
    function breadcrums(type,catname){
	
		nextShow('breadcurmsdiv');
		if (document.getElementById('brad_'+type)) {
			    
					$('#brad_'+type+'').nextAll('.bredcrumnext').remove();
					$('#brad_'+type+'').remove();
					$('<li class="breadcrumb-item bredcrumnext" id="brad_'+type+'" ><a href="javascript:void(0)">'+catname+'</a></li>').appendTo(".nextbrad");

       } else {
	          
				$('#brad_'+type+'').nextAll('.bredcrumnext').remove();
				$('<li class="breadcrumb-item bredcrumnext" id="brad_'+type+'" ><a href="javascript:void(0)">'+catname+'</a></li>').appendTo(".nextbrad");
			}    
	}
    var cat_count =0; 
function category(catid,ulID,type,catulID,catname){
	breadcrums(type,catname);
	var titleVal =$("input[name=title]").val();
	var brandVal =$("#brandoption").val();
    $(".b-red").removeClass("b-red");
	$('.emptymsgs').text('');  
    if(titleVal!=null && titleVal!='' && brandVal!=null && brandVal!=''){
    $("#addVariantButton").prop('disabled', true);
	$('#categoryBtn').css('display', 'none');
	$( 'ul#'+catulID+' li' ).on( 'click', function(event) {
		       
                $( this ).parent().find( 'li.catulActive' ).removeClass( 'catulActive' );               
				$( this ).addClass( 'catulActive' );
				
			
          });
    var typesuper=0;
    cat_count++;
	
    $('#'+type+'').nextAll('.alldiv').remove();
    $.ajax({
            
            url: "{{route('vendor.ajaxCategoryFind')}}",
            methods: "POST",           
			data:{id: catid,type: type,typesuper: typesuper,cat_count:cat_count},
		    success: function(data){
				
               if(data.catID!=null){
				
				   if(data.veriant!=null){
                    $("#addVariantButton").prop('disabled', false);
				   }
				
				$('#categoryBtn').css('display', 'initial');
				$(data.catID).appendTo("#categoryDivs");
				$('#nextslider').click();
				 getCustomFields(catid);
				//  $('#brad_'+type+'').remove();
               }
               else{
				  $(data).appendTo("#categoryDivs");
                 $('#resource-slider .resource-slider-item').each(function(i) {
                 var $this = $(this),
                 left = $this.width() * i;
                 $this.css({
                  left: left
                  })
				 }); 
				 // end each

				 $('#nextslider').click();

				 //call custom fields and append theme 
				 getCustomFields(catid);

               }
                
            }
        });
        if(typesuper==0){
        typesuper=1;
    }

}else{
	if(titleVal==null || titleVal==''){
	$('#titleMsg').text('The title field is required');
	toastr.error('', 'The title field is required');
	bordercolor('title');
	}
	if(brandVal==null || brandVal==''){
	$('#brandMsg').text('The brand field is required');
	toastr.error('', 'The brand field is required');
     bordercolor('brand');
	}
	

}
}

    function defer(method) {
      if (window.jQuery)
        method();
      else
        setTimeout(function() {
          defer(method)
        }, 50);
    }
defer(function() {
      (function($) {
        
        function doneResizing() {
          var totalScroll = $('.resource-slider-frame').scrollLeft();
          var itemWidth = $('.resource-slider-item').width();
          var difference = totalScroll % itemWidth;
          if ( difference !== 0 ) {
            $('.resource-slider-frame').animate({
              scrollLeft: '-=' + difference
            }, 500, function() {
              // check arrows
              checkArrows();
            });
          }
        }
        
 function checkArrows() {
          var totalWidth = $('#resource-slider .resource-slider-item').length * $('.resource-slider-item').width();
          var frameWidth = $('.resource-slider-frame').width();
          var itemWidth = $('.resource-slider-item').width();
          var totalScroll = $('.resource-slider-frame').scrollLeft();
          
          if ( ((totalWidth - frameWidth) - totalScroll) < itemWidth ) {
            $(".next").css("visibility", "visible");
          }
          else {
            $(".next").css("visibility", "visible");
          }
          if ( totalScroll < itemWidth ) {
            $(".prev").css("visibility", "visible");
          }
          else {
            $(".prev").css("visibility", "visible");
          }
    }
        
    $('.arrow').on('click', function() {
          var $this = $(this),
            width = $('.resource-slider-item').width(),
            speed = 500;
          if ($this.hasClass('prev')) {
            $('.resource-slider-frame').animate({
              scrollLeft: '-=' + width
            }, speed, function() {
              // check arrows
              checkArrows();
            });
          } else if ($this.hasClass('next')) {
            $('.resource-slider-frame').animate({
              scrollLeft: '+=' + width
            }, speed, function() {
              // check arrows
              checkArrows();
            });
          }
        }); // end on arrow click
        
        $(window).on("load resize", function() {
          checkArrows();
          $('#resource-slider .resource-slider-item').each(function(i) {
            var $this = $(this),
              left = $this.width() * i;
            $this.css({
              left: left
            })
          }); // end each
        }); // end window resize/load
        
        var resizeId;
        $(window).resize(function() {
            clearTimeout(resizeId);
            resizeId = setTimeout(doneResizing, 500);
        });
        
      })(jQuery); // end function
});
   
	</script>

	<script>
$( "#titlFrm" ).on( "submit", function(e) {
	 
	var titleVal =$("input[name=title]").val();
	var brandVal =$("#brandoption").val();
    $(".b-red").removeClass("b-red");
	$('.emptymsgs').text('');  
    if(titleVal!=null && titleVal!='' && brandVal!=null && brandVal!=''){
         var dataString = $(this).serialize();
		 var product_id=null; 
			 product_id= $("#currentProductID").val();
			 $('.emptymsgs').text('');  
		$.ajax({
			            
						type: "POST",
						url: "{{url('vendor/add-product')}}",
						data: dataString+"&action=titleForm&productId="+product_id,
						dataType: 'json',
						success: function (json) {
						 
							
							
							if(json.msg=='Product Created Successfully'  &&  json.product_id!=''){
								$("#currentProductID").val(json.product_id);
								toastr.success('', 'Product step 1 completed!');
								$('#titleBtn').text('Update');
								 nextShow('category-div');
								 $('.emptymsgs').text('');
								 $('#titleCollap').click();
								
							}
							if(json.msg=='Product Updated Successfully'  &&  json.product_id!=''){
								$("#currentProductID").val(json.product_id);
								toastr.success('', 'Product step 1 updated!');
								$('#titleBtn').text('Update');
								 nextShow('imageDiv');
								 $('.emptymsgs').text('');
								 $('#titleCollap').click();
								
							}
							 if(json.msg=='Product Not Updated'){
								if(json.titleError!=''){
									$('#titleMsg').text(json.titleError);
									 toastr.error('', json.titleError);
								}
								if(json.brandError!=''){
									$('#brandMsg').text(json.brandError);
									toastr.error('', json.brandError);
								}
								
								
							}
							

				}
			}
			);
				}else{
			if(titleVal==null || titleVal==''){
	$('#titleMsg').text('The title field is required');
	toastr.error('', 'The title field is required');
	bordercolor('title');
	}
	if(brandVal==null || brandVal==''){
	$('#brandMsg').text('The brand field is required');
	toastr.error('', 'The brand field is required');
     bordercolor('brand');
	}
		}

       e.preventDefault();
});

$( "#categoryFrm" ).on( "submit", function(e) {
	
		  var dataString = $(this).serialize();
		  var product_id=null; 
			  product_id= $("#currentProductID").val();
			  $('.emptymsgs').text('');  
			  var catIDCheck=$("input[name='cate_id[]']").val();
		    if(catIDCheck!=null && catIDCheck!='' && catIDCheck!='undefine'){
		 $.ajax({
						 
						 type: "POST",
						 url: "{{url('vendor/add-product')}}",
						 data: dataString+"&action=categoryForm&productId="+product_id,
						 dataType: 'json',
						 success: function (json) {
							cattxt=$('#categoryBtn').text();
							if(cattxt=='Update'){

								toastr.success('', 'Product step 2 Updated!');
							}else{
								toastr.success('', 'Product step 2 Completed!');
								
							}
							
							    $('#catCollap').click();
							    $('#categoryBtn').text('Update');
								 nextShow('imageDiv');
								 $('.emptymsgs').text('');
							 
							
				         }
			 }
			 );
			}else{
				
				$('#catMsg').text('Category Required!');
				toastr.error('', 'Category Required!');
			}
				 
 
		e.preventDefault();
 });
	</script>
	<script>
	
function updatedesc(btnID){
	var ed = tinyMCE.get('editortiny');

			var description = ed.getContent();
			var whatsbox = $('#whats_in_box').val();
		    var product_id=null; 
				product_id= $("#currentProductID").val();
				$('.emptymsgs').text('');
            if (description!=null && description!='' && whatsbox!='' && whatsbox!=null) {
                $.ajax({
                    url: "{{url('vendor/add-product')}}",
                    type: "POST",
                    data: { description: description,whatsbox: whatsbox, productId: product_id, action: 'descriptionfrm' },
                    dataType: "json",
                    success: function(json) {
						
						if(json.msg=='Product Description Updated Successfully' &&  json.product_id!=''){
							$("#currentProductID").val(json.product_id);
							if($('#'+btnID).text()=='Next'){
								toastr.success('', 'Product step 6 completed!');
								$('#desCollap').click();
							}else{
								toastr.success('', 'Product step 6 updated successfully!');
								$('#desCollap').click();
							}
							
							$('#'+btnID).text('Update');
						   
							 $('.emptymsgs').text('');
						}if(json.msg=='Product Description And Whats In The Box Not Updated'){
							
							toastr.error('', 'Description And Whats In The Box not updated!');
						}
						if(json.product_id==''){
										toastr.error('', 'Listing expire please refresh page and start new listing!');
									}
						
                    }
                });
			}
			else{
				if(whatsbox==null || whatsbox==''){
					$('#boxMsg').text('Whats in the box Required!');
				    toastr.error('', 'Whats in the box  Required!');
				}
				if(description==null || description==''){
					$('#descMsg').text('Description Required');
				    toastr.error('', 'Description Required!');
				}
				
			}
	
}
	</script>
<script>
	$(document).ready(function(e){
    // Submit form data via Ajax
    $("#choice_form").on('submit', function(e){
		
			e.preventDefault();
			var product_id=null; 
			var formData = new FormData(this);
		     
			product_id= $("#currentProductID").val();
			formData.append('action','choice_form');
			formData.append('productId',product_id);
			$('.emptymsgs').text('');  
            $.ajax({
            type: 'POST',
			url: "{{url('vendor/add-product')}}",
			data: formData,
			dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
             
            },
            success: function (json) {

				             if(json.msg=='Product Inventory Updated Successfully' &&  json.product_id!=''){
								 $("#currentProductID").val(json.product_id);
								 if($('#inventoryBtn').text()=='Next'){
									toastr.success('', 'Product step 4 completed!');
								
								  }else{
								  toastr.success('', 'Product step 4 updated!');
								
								 }
								 $('#inventoryBtn').text('Update');
									
									
									
									$('#verCollap').click();
									
									nextShow('description-card');
									// nextShow('addvariationsdiv');
	                                // nextShow('customer_options');
									
								 }
								 if(json.msg=='Product Inventory Not Updated'){
									 toastr.error('', 'Product inventory not updated');
								 }
								  if(json.width !='' && json.width!=null &&  json.product_id!=''){
								 
									 $('#widthMsg').text(json.width);
									 toastr.error('', json.width);
								 }
								 if(json.weight !='' && json.weight!=null &&  json.product_id!=''){
								 
									 $('#weightMsg').text(json.weight);
									 toastr.error('', json.weight);
								 }
								 if(json.hieght !='' && json.hieght!=null &&  json.product_id!=''){
									 $('#heigtMsg').text(json.hieght);
									 toastr.error('', json.hieght);
								 }
								 if(json.length !='' && json.length!=null &&  json.product_id!=''){
									 $('#lengthMsg').text(json.length);
									 toastr.error('', json.length);
								 }
								 if(json.product_id==''){
									 toastr.error('', 'Listing expire please refresh page and start new listing!');
								 }
							 
 
								 }
        });
    });
});	
</script>

<script>

	function cancelListing(){
		product_id= $("#currentProductID").val();
		if(product_id!=null && product_id!=''){
			Swal.fire({
			title: 'Are you sure to cancel this listing?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText:'Continue Listing!',
			confirmButtonColor: '#4839EB',
			cancelButtonColor: '#28C76F',
			confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			if (result.isConfirmed) {
			
				$.ajax({
                    url: "{{url('vendor/add-product')}}",
                    type: "POST",
                    data: { productId: product_id , action: 'exitListing' },
                    dataType: "json",
                    success: function(json) {
					  if(json.msg=='Product deleted'){
						  window.location.href = "{{route('vendor.dashboard.get')}}";
					   }else{
						
							window.location.href = "{{route('vendor.dashboard.get')}}";
					   }
						
                    }
                });
			
			}
			})
		}else{
	         window.location.href = "{{route('vendor.dashboard.get')}}";
		}
	}

</script>
<script>
function afterimg(){
	if (dropzon_file_1==true) {
		$('.emptymsgs').text('');
       nextShow('inventoryDiv');
	   imgtxt=$('#finishProduct').text();
	   if(imgtxt=='Update'){
		toastr.success('', 'Product step 3 Updated!');
	    }else{
		toastr.success('', 'Product step 3 completed!');
	   }
	  $('#finishProduct').text('Update');
      $('#imgCollap').click();
	
   }else{
	$('#dropzon_file_1').text('This picture is required.');
	toastr.error('', 'Please Upload Thumbnail!');
   } 
}


</script>
<script>
$("#varientBtn").click(function(){
    var width=$('#width').val();
	var height=$('#weight').val();
	var length=$('#length').val();
	var weight=$('#hieght').val();
	if( width !='' && height !='' && length !='' && weight !=''){
		
		btnText=$('#varientBtn').text();
		if(btnText=='Update'){
			$('#inventoryBtn').click();
		}else{

		 $("#varientBtn").text('Update');
		 $('#invCollap').click();
	     nextShow('addvariationsdiv');
         nextShow('customer_options');

		
		}
		requiredcheck();
		
	}else{
		
		requiredcheck();
	}
	

});


function requiredcheck(){
	var required = document.querySelectorAll("input[required]");
           required.forEach(function(element) {
           if(element.value.trim() == "") {
           element.style.borderColor  = "rgb(228, 88, 88)";
           } else {
             element.style.borderColor  = "";
           }
          });
}
</script>



@endsection
    
