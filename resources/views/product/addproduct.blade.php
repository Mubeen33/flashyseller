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
	.catulActive{
		border-color: #4839EB !important;
    background-color: #7367F0 !important;
    color: #FFFFFF;

	}
	
</style>
	
<div class="content-body">
	<div class="container-fluid">
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
					  <div class="card">
						  <div class="card-body">
							  <div class="row">
							
										 <div class="col-lg-12">
											 <label class="mb-xs-1 strong">Listing Details</label> <br/>
											 <p class="text-gray-lighter">
												 Include keywords that buyers would use to search for your item.
											 </p>
										 </div>	
									 </div>
									 <div class="row">
										
										 <div class="col-lg-12"> <br />
											<div class="mb-xs-2 strong"> Title <span class="text-gray-lightest">*</span> </div>
											 <label id="titleMsg" class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></label>
											 <input type="text" class="form-control" name="title" required="" />
											 <p class="text-smaller text-gray-lighter">
												Include keywords that buyers would use to search for your item.
											</p>
										 </div>
									 </div>
									 
									 <div class="row" style="margin-bottom: 3%;">
										
										 <div class="col-lg-12"> <br />
											<label id="catMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></label>
										   <div class="row resources" >
											<div class="container"  id="resource-slider" >
												<a href="javascript:void(0)" class='arrow prev btn btn-primary waves-effect waves-light'></a>
												<a href="javascript:void(0)" class='arrow next btn btn btn-primary waves-effect waves-light' id="nextslider"></a>
												<div class=" resource-slider-frame" id="categoryDivs">
													@include('product.partials.category-select')
												   
												</div>
								            </div>
								            </div>
										 </div>
									 </div>
									<div id="render__customfields__data">
										@include('product.partials.auto-customfields')
									</div>
									  
									 <div class="row" >
										<div class="col-lg-12" style="text-align: right; margin-top: 2%;">
											<button id="titleBtn" style="display: none;" type="submit" class="btn btn-primary waves-effect waves-light">Next</button>
										</div>
									</div>
						  </div>
					  </div>
					</form>
					  <!-- End Listing Details -->
					  <!--start description portion style="display: none" -->
					       
					  <div class="card" id="description-card" style="display: none">
						  <div class="card-body">
							    <div class="row">
									<div class="col-lg-12">
							            <div class="row">
												
												<div class="col-lg-12">
													<label class="mb-xs-1 strong">Description</label> <br/>
													<label id="descMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></label>
                                                    <p class="text-smaller">
														Start with a brief overview that describes your item’s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
												Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.
													</p>
													{{-- <textarea class="form-control textarea" rows="10" name="description"></textarea> --}}
													<textarea  name="description" id="editortiny"></textarea>

												</div>
									    </div>
										</div>
										<div class="col-lg-12">
									    <div class="row" >
												<div class="col-lg-12" style="text-align: right; margin-top: 2%;">
													<a id="descriptionBtn"  href="javascript:void(0)" onclick="updatedesc('descriptionBtn')"   class="btn btn-primary waves-effect waves-light">Next</a>
												</div>
									   </div>
									   </div>
						        </div>
					    </div>
					  </div>
					  <!--end description portion -->
					  <!-- Inventory and pricing  -->
					  <form id="choice_form" action="" method="post" enctype="multipart/form-data" >
					  <div class="card" id="inventoryDiv" style="display: none;">
						  <div class="card-body">
							  <div class="mb-xs-1 strong"> Inventory and Dimension
						  </div> <br />
						  <div class="row">
							  <div class="col-lg-3">
								  <div class="mb-xs-2 strong"> SKU <span class="text-gray-lightest">Optional</span> </div>
								  <p class="text-smaller text-gray-lighter">
									  SKUs are for your use only — buyers won’t see them. 
								  </p>
							  </div>
							  <div class="col-lg-3">
								  <br />
								  <input type="text" class="form-control" name="sku" placeholder="SKU"/>
							  </div>
						  </div>
						<div class="row">
							<div class="col-lg-3">
								<div class="mb-xs-2 strong"> Width </div>
								<p class="text-smaller text-gray-lighter">
									Width description 
								</p>
								<label id="widthMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></label>
                                <input type="text" class="form-control" name="width"  placeholder="Width"/>
							</div>
							<div class="col-lg-3">
								<div class="mb-xs-2 strong"> Height  </div>
								<p class="text-smaller text-gray-lighter">
									Height description 
								</p>
								<label id="heigtMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></label>
								<input type="text" class="form-control" name="hieght" placeholder="Height"/>
							</div>
							<div class="col-lg-3">
								<div class="mb-xs-2 strong"> Length  </div>
								<p class="text-smaller text-gray-lighter">
									Length description 
								</p>
								<label id="lengthMsg"  class="emptymsgs" style="color: rgb(228, 88, 88); font-size: medium;"></label>
                                <input type="text" class="form-control" name="length" placeholder="Length"/>
							</div>
						</div>
					
						  <hr />
						  <div class="row">
							  <div class="col-lg-9">
								  <label class="mb-xs-2 strong">Variations</label> <br/>
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
						  
						  </div>
					  </div>
				
					
					
					<div class="card" >
						<div style="display: none;" id="variant-card">
						
							<div class="card-body">
								<h5 class="modal-title">Add variations</h5><br>
	
								  <div class="col-md-12 mx-0 px-0" id="loadSecondVariationOptionsData"></div>
	
								<div class="row" id="render__variations__data">
									<div class="col-lg-4">
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
						 
				         <div class="text-right mb-20" >
					         <button id="inventoryBtn" style="margin-right: 2% !important;     margin-bottom: 2%;" type="submit" class="btn btn-primary waves-effect waves-light">Next</button>
				         </div>
			       </div>
			     </div>
				
				  <!-- End Inventory and pricing  -->
			</form> 
      		
      <!-- Photos -->
	  <div class="card form-group" id="imageDiv" style="display: none">
		<div class="card-body">
			
		   <div class="row">
			   <div class="col-lg-12">
				   <label class="mb-xs-1 strong">Photos</label> <br/>
				   <p class="text-gray-lighter">Add as many as you can so buyers can see every detail<small>(Use up to ten photos to show your item's most important qualities).</small> </p>	
				   <label class="text-smaller text-gray-lighte"> Tips: </label>
			   </div>
		   </div>
		   <div class="row">
			   <div  class="col-lg-2 col-md-3">
				   <ul class="text-smaller text-gray-lighter">
					   <li>Use natural light and no flash. </li>
					   <li>Include a common object for scale. </li>
					   <li>Show the item being held, worn, or used. </li>
					   <li>Shoot against a clean, simple background. </li>
				   </ul>
			   </div>

			   <div class="col-lg-2 col-md-3 col22">
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
			   <div class="col-lg-2 col-md-3 col22">
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
			   <div class="col-lg-2 col-md-3 col22">
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
			   <div class="col-lg-2 col-md-3 col22">
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
			   <div class="col-lg-2 col-md-3 col22">
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
			   </div>  
			   <br />      
				   <div class="row">
					   <div class="col-lg-2"></div>
					   <div class="col-lg-8 ml-3">
						   <p class="strong mb-xs-2"> Link photos to variations </p>
						   <p class="text-smaller text-gray-lighter">
							   Add photos to your variations so buyers can see all their options. Try it out
						   </p>
					   </div>
				   </div> 
				   <div class="row">
					<div class="col-lg-12">
				   <div class="text-right mb-20" >
					<a href="{{route('vendor.addNewProduct.get')}}" id="finishProduct" style="margin-right: 2% !important;     margin-bottom: 2%;"  class="btn btn-primary waves-effect waves-light">Finish Listing</a>
				</div>  			
				</div>  			
				</div>  			
		   </div>
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
  
  <script type="text/javascript">


  $(function() {
     $("div.dz-preview").parent().children('div.dz-message').css('display', 'none');
  });
</script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
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

    
// // variant card
    function openVariant(){
        $('#variant-card').css('display','');
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
        });    
      }
      function update_sku(){
            $.ajax({
           type:"POST",
           url:'{{ route('vendor.products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data){
          
             $('#customer_choice_options').html(data);
             
           }
         });
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
    
    var cat_count =0; 
function category(catid,ulID,type,catulID){
    $("#addVariantButton").prop('disabled', true);
	$('#titleBtn').css('display', 'none');
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
				
				$('#titleBtn').css('display', 'initial');
				$(data.catID).appendTo("#categoryDivs");
				$('#nextslider').click();
				 getCustomFields(catid);
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
								 nextShow('description-card');
								 $('.emptymsgs').text('');
								
							}
							if(json.msg=='Product Updated Successfully'  &&  json.product_id!=''){
								$("#currentProductID").val(json.product_id);
								toastr.success('', 'Product step 1 updated!');
								$('#titleBtn').text('Update');
								 nextShow('description-card');
								 $('.emptymsgs').text('');
								
							}
							 if(json.msg=='Product Not Updated'){
								if(json.titleError!=''){
									$('#titleMsg').text(json.titleError);
									toastr.error('', json.titleError);
								}
								if(json.categoryError=='The cate id field is required.' && json.categoryError!=''){
									$('#catMsg').text('Please select desired category.');
									toastr.error('', 'Please select desired category.');
								}
								
							}
							

				}
			}
			);
			

       e.preventDefault();
});

	</script>
	<script>
	
function updatedesc(btnID){
	var ed = tinyMCE.get('editortiny');

			var description = ed.getContent();
		    var product_id=null; 
				product_id= $("#currentProductID").val();
				$('.emptymsgs').text('');
            if (description!=null && description!='') {
                $.ajax({
                    url: "{{url('vendor/add-product')}}",
                    type: "POST",
                    data: { description: description, productId: product_id, action: 'descriptionfrm' },
                    dataType: "json",
                    success: function(json) {
						
						if(json.msg=='Product Description Updated Successfully' &&  json.product_id!=''){
							$("#currentProductID").val(json.product_id);
							if($('#'+btnID).text()=='Next'){
								toastr.success('', 'Product step 2 completed!');
							}else{
								toastr.success('', 'Product description updated successfully!');
							}
							
							$('#'+btnID).text('Update');
						     nextShow('inventoryDiv');
							 nextShow('customer_options');
							 $('.emptymsgs').text('');
						}if(json.msg=='Product Description Not Updated'){
							
							toastr.error('', 'Description not updated!');
						}
						if(json.product_id==''){
										toastr.error('', 'Listing expire please refresh page and start new listing!');
									}
						
                    }
                });
			}
			else{
				$('#descMsg').text('Description Required*');
				toastr.error('', 'Description Required!');
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
									toastr.success('', 'Product step 3 completed!');
								  }else{
								  toastr.success('', 'Product inventory updated successfully!');
								 }
								 $('#inventoryBtn').text('Update');
									nextShow('imageDiv');
							  
								 }
								 if(json.msg=='Product Inventory Not Updated'){
									 toastr.error('', 'Product inventory not updated');
								 }
								  if(json.width !='' && json.width!=null &&  json.product_id!=''){
								 
									 $('#widthMsg').text(json.width);
									 toastr.error('', json.width);
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

@endsection
    
