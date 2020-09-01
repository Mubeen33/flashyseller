@extends('layouts.master')
@section('page-title','Add Product')
@section('breadcrumbs')                            
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Add Product</li>
@endsection
@section('content')
<style type="text/css">
  .p-graph {
    font-size:10px !important;
  }

</style>
<div class="content-body">
	<div class="container-fluid">
          <form class="" method="post">

      		<!-- Photos -->
      		<div class="card form-group">
             	<div class="card-body">
             				<div class="row">
             					<div class="col-lg-12">
             						<label class="mb-xs-1 strong">Photos</label> <br/>
                 					<p class="text-gray-lighter">Add as many as you can so buyers can see every detail<small>(Use up to ten photos to show your item's most important qualities).</small> </p>	
      					         	<label class="text-smaller text-gray-lighte"> Tips: </label>
             					</div>
             				</div>
            				<div class="row">
            					<div  class="col-lg-2">
            						<ul class="text-smaller text-gray-lighter">
            							<li>Use natural light and no flash. </li>
            							<li>Include a common object for scale. </li>
            							<li>Show the item being held, worn, or used. </li>
            							<li>Shoot against a clean, simple background. </li>
            						</ul>
            					</div>
                	<div class="col-lg-2 ">
                            <form>  
                                <img src="{{ asset('images/upld.png') }}" id="img1" product="img" n="1" height="185px" onchange="" width="100%" class="upld-image" />
                                <input type="file" name="img1" id="pimg1" style="display:none;" />
                            </form>
                    </div>
                    <div class="col-lg-2 ">
                            <form>
                                <img src="{{ asset('images/upld.png') }}" id="img2" product="img" n="2" height="185px" onchange="" width="100%" class="upld-image"  />
                                <input type="file" name="img2" id="pimg2" style="display:none;" />
                            </form>
                    </div>
                    <div class="col-lg-2 ">
                        <form>
                            <img src="{{ asset('images/upld.png') }}" id="img3" product="img" n="3" height="185px" onchange="" width="100%" class="upld-image"  />
                            <input type="file" name="img3" id="pimg3" style="display:none;" />
                        </form>
                    </div>  
                    <div class="col-lg-2 ">
                        <form>
                            <img src="{{ asset('images/upld.png') }}" id="img4" product="img" n="4" height="185px" onchange="" width="100%" class="upld-image"  />
                            <input type="file" name="img4" id="pimg4" style="display:none;" />
                        </form>
                    </div>  
                    <div class="col-lg-2 ">
                        <form>  
                            <img src="{{ asset('images/upld.png') }}" id="img5" product="img" n="5" height="185px" onchange="" width="100%" class="upld-image"  />
                            <input type="file" name="img5" id="pimg5" style="display:none;" />
                        </form>  
                      </div>
            		</div>  
                    <br />      
            				<div class="row">
            					<div class="col-lg-2"></div>
            					<div class="col-lg-8">
            						<p class="strong mb-xs-2"> Link photos to variations </p>
            						<p class="text-smaller text-gray-lighter">
            							Add photos to your variations so buyers can see all their options. Try it out
            						</p>
            					</div>
            				</div>     			
      			  </div>
      		</div>
      
      <form class="">    
      		<!-- end Photos -->
      		<!-- Card video -->
      		<div class="card">
      			<div class="card-body pad-video" style="padding-top:1%; !important;">
      				    <div class="row">
      						<div class="col-lg-2">
      							<label class="mb-xs-1 strong">Video</label>
      						</div>
      						<div class="col-lg-9">
      							<input type="text" placeholder="Paste here youtube link" class="form-control" name="youtube">
      							<p class="text-smaller text-gray-lighter">
      								Add photos to your variations so buyers can see all their options. Try it out
      							</p>
      						</div>
      					</div>    
      			</div>
      		</div>
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
                 				<div class="col-lg-3">
             						<div class="mb-xs-2 strong"> Title <span class="text-gray-lightest">*</span> </div>

             						<p class="text-smaller text-gray-lighter">
             							Include keywords that buyers would use to search for your item.
             						</p>
             					</div>
             					<div class="col-lg-9"> <br />
             						<input type="text" class="form-control" name="" />
             					</div>
                 			</div>
                 			<div class="row">
                 				<div class="col-lg-3">
             						<div class="mb-xs-2 strong"> About this listing <span class="text-gray-lightest">*</span> </div>
             						<p class="text-smaller text-gray-lighter">
             							Learn more about what types of items are allowed on Etsy.
             						</p>
             					</div>
             					<div class="col-lg-3">
             						<br />
             						<select class="form-control">
             							<option selected >Who made it?</option>
             							<optgroup label="Select a maker">
      						      <option value="I did">I did</option>
      						      <option value="A member of my shop">A member of my shop</option>
      						      <option value="Another company or person" >Another company or person</option>
      						    </optgroup>
             						</select>
             					</div>
             					<div class="col-lg-3">
             						<br />
             						<select class="form-control">
             							<option>What is it?</option>
             							<optgroup label="Select a use">
      						      <option value="A finished product">A finished product</option>
      						      <option value="Another company or person" selected>
      						      	A supply or tool to make things
      						      </option>
      						    </optgroup>
             						</select>
             					</div>
             					<div class="col-lg-3">
             						<br />
             						<select class="form-control">
             							<option>Whan was it made?</option>
             							<optgroup label="Not yet Made">
      						      <option value="Made to order">Made to order</option>
      						    </optgroup>
      						    <optgroup label="Recently">
      						      <option value="2020 - 2020">2020 - 2020</option>
      						      <option value="2010 - 2019">2010 - 2019</option>
      						      <option value="2001 - 2009">2001 - 2009</option>
      						    </optgroup>
      						    <optgroup label="Vintage">
      						      <option value="Before 2001">Before 2001</option>
      						      <option value="2010 - 2019">2000 - 2000</option>
      						      <option value="1990s">1990s</option>
      						       <option value="1980s">1980s</option>
      						       <option value="1970s">1970s</option>
      						    </optgroup>
             						</select>
             					</div>
                 			</div>
                 			<div class="row">
                 				<div class="col-lg-3">
             						<div class="mb-xs-2 strong"> Category 
             							<span class="text-gray-lightest">*</span> 
             						</div>
             						<p class="text-smaller text-gray-lighter">
             							Type a two- or three-word description of your item to get category suggestions that will help more shoppers find it.
             						</p>
             					</div>
             					<div class="col-lg-9"> <br />
             						<input type="text" id="project" class="form-control" name="" />
             					</div>
                 			</div>
                 			<div id="category">
                 				<div class="row">
                 					<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> Primary colour 
                 							<span class="text-gray-lightest">Optional</span> 
                 						</div>
                 						<p class="text-smaller text-gray-lighter">
                 							Primary and secondary colour attributes are interchangeable so you can show shoppers that your item is multicoloured. Skip secondary colour if your item is only one colour.
                 						</p>
                 					</div>
                 					<div class="col-lg-3"> <br />
                 						<select class="form-control" name="pcolor">
                 							<option>Choose primary colour</option>
                 							<optgroup label="Primary colour options">
                 								<option>Beige</option>
                 								<option>Black</option>
                 								<option>Blue</option>
                 								<option>Bronze</option>
                 								<option>Brown</option>
                 								<option>Orange</option>
                 								<option>Gold</option>
                 							</optgroup>
                 						</select>
                 					</div>
                 				</div>
                 				<div class="row">
                 					<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> secondary colour
                 							<span class="text-gray-lightest">Optional</span> 
                 						</div>
                 					</div>
                 					<div class="col-lg-4">
                 						<select class="form-control" name="pcolor">
                 							<option>Choose secondary colour</option>
                 							<optgroup label="Secondary colour options">
                 								<option>Beige</option>
                 								<option>Black</option>
                 								<option>Blue</option>
                 								<option>Bronze</option>
                 								<option>Brown</option>
                 								<option>Orange</option>
                 								<option>Gold</option>
                 							</optgroup>
                 						</select>
                 					</div>
                 				</div> <br />
                 				<div class="row">
                 					<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> Pattern
                 							<span class="text-gray-lightest">Optional</span> 
                 						</div>
                 					</div>
                 					<div class="col-lg-4">
                 						<select class="form-control" name="pcolor">
                 							<option>Choose Patteren</option>
                 							<optgroup label="Patteren Option">
                 								<option>Animal print</option>
                 								<option>Argyle</option>
                 								<option>Camouflage</option>
                 								<option>Check</option>
                 								<option>Chevron</option>
                 								<option>Herringbone</option>
                 								<option>Houndstooth</option>
                 							</optgroup>
                 						</select>
                 					</div>
                 				</div> <br />
                 				<div class="row">
                 					<div class="col-lg-3">
                 						<div class="mb-xs-2 strong"> Theme
                 							<span class="text-gray-lightest">Optional</span> 
                 						</div>
                 					</div>
                 					<div class="col-lg-4">
                 						<select class="form-control" name="pcolor">
                 							<option>Choose Theme</option>
                 							<optgroup label="Theme Option">
                 								<option>Abstract & geometric</option>
                 								<option>Animal</option>
                 								<option>Anime & cartoon</option>
                 								<option>Architecture & cityscape</option>
                 								<option>Beach & tropical</option>
                 								<option>Bling & glam</option>
                 								<option>Fitspiration</option>
                 							</optgroup>
                 						</select>
                 					</div>
                 				</div>
                 			</div> <br />
                 			<div class="row">
                 				<div class="col-lg-3">
             						<div class="mb-xs-2 strong"> Renewal options 
             							<span class="text-gray-lightest">*</span> 
             						</div>
             						<p class="text-smaller text-gray-lighter">
             							Each renewal lasts for four months or until the listing sells out. Get more details on auto-renewing here.
             						</p>
             					</div>
             					<div class="col-lg-3"> <br />
                 					<label class="radio-custom">
                 						<input type="radio" name="renewal" > <span class="radio-label">  Automatic </span>
                 						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                 							This listing will renew as it expires for USD 0.20 USD each time (recommended).
                 						</p>
             						</label>
             					</div>
             					<div class="col-lg-3"> <br />
             						<label class="radio-custom">
                 						<input type="radio" name="renewal" > <span class="radio-label">  Mannual </span>
                 						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                 							I'll renew expired listings myself.
                 						</p>
             						</label>
             					</div>
                 			</div>
                 			<div class="row">
                 				<div class="col-lg-3">
             						<div class="mb-xs-2 strong"> Type
             							<span class="text-gray-lightest">*</span> 
             						</div>
             					</div>
             					<div class="col-lg-3"> <br />
                 					<label class="radio-custom">
                 						<input type="radio" name="type" > <span class="radio-label">  Physical </span>
                 						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                 							A tangible item that you will deliver to buyers.
                 						</p>
             						</label>
             					</div>
             					<div class="col-lg-3"> <br />
             						<label class="radio-custom">
                 						<input type="radio" name="type" > <span class="radio-label">  Digital </span>
                 						<p class="text-smaller text-gray-lighter" style="margin-left:15px;">
                 							A digital file that buyers will download.
                 						</p>
             						</label>
             					</div>
                 			</div>
                 			<div class="row">
                 				<div class="col-lg-3">
             						<div class="mb-xs-2 strong"> Description
             							<span class="text-gray-lightest">*</span> 
             						</div>
             						<p class="text-smaller">
             							Start with a brief overview that describes your item’s finest features. Shoppers will only see the first few lines of your description at first, so make it count!
      							Not sure what else to say? Shoppers also like hearing about your process, and the story behind this item.
             						</p>
             					</div>
             					<div class="col-lg-9">
             						<textarea class="form-control textarea" rows="10"></textarea>
             					</div>
             				</div>
      			</div>
      		</div>
      		<!-- End Listing Details -->
      		<!-- Inventory and pricing  -->
      		<div class="card">
      			<div class="card-body">
      				<div class="mb-xs-1 strong"> Inventory and pricing
      			</div> <br />
      			<div class="row">
      				<div class="col-lg-3">
      					<div class="mb-xs-2 strong"> Price <span class="text-gray-lightest">*</span> </div>
      					<p class="text-smaller text-gray-lighter">
      						Remember to factor in the costs of materials, labour, and other business expenses. If you offer free delivery, make sure to include the cost of postage so it doesn't eat into your profits.
      					</p>
      				</div>
      				<div class="col-lg-3">
      					<br />
      					<input type="text" class="form-control" name="price" />
      				</div>
      			</div>
      			<div class="row">
      				<div class="col-lg-3">
      					<div class="mb-xs-2 strong"> Quantity <span class="text-gray-lightest">*</span> </div>
      					<p class="text-smaller text-gray-lighter">
      						For quantities greater than one, this listing will renew automatically until it sells out. You’ll be charged a USD 0.20 USD listing fee each time.
      					</p>
      				</div>
      				<div class="col-lg-3">
      					<br />
      					<input type="text" class="form-control" name="price" />
      				</div>
      			</div>
      			<div class="row">
      				<div class="col-lg-3">
      					<div class="mb-xs-2 strong"> SKU <span class="text-gray-lightest">Optional</span> </div>
      					<p class="text-smaller text-gray-lighter">
      						SKUs are for your use only — buyers won’t see them. 
      					</p>
      				</div>
      				<div class="col-lg-3">
      					<br />
      					<input type="text" class="form-control" name="sku" />
      				</div>
      			</div>
      			<hr />
      			<div class="row">
      					<div class="col-lg-12">
      						<label class="mb-xs-2 strong">Variations</label> <br/>
         					<p class="text-gray-lighter">Add available options like color or size. Buyers will choose from these during checkout.</p>
      					</div>
      				</div>
      			<div class="row">
      					<div class="col-lg-12">
      						<button data-toggle="modal" data-target="#primary" type="button" class="btn btn-light mr-1 mb-1 waves-effect waves-light">
      							Add Variations
      						</button>
                           <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header white">
                                          <h5 class="modal-title" id="myModalLabel160">Add variations</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <div id="variationsbox"></div>
                                          <br />
                                          <div class="row">
                                          	<div class="col-lg-6">
                                          		<select id="variationopt" class="form-control" name="variation">
                                          			<option>Choose Variation Type</option>
                                          			<optgroup label="Variation Type">
                                          		          <option value="pc" nam="Primary Colour">
                                                            Primary colour
                                                        </option>
                                                        <option value="sc" nam="Secondary Colour">
                                                            Secondary colour
                                                        </option>
                                                        <option value="diameter" nam="Diameters">
                                                            Diameters
                                                        </option>
                                                        <option nam="Fabric" value="fabric">
                                                          Fabric
                                                        </option>
                                                        <option value="flavour" nam="Flavour">
                                                            Flavour
                                                        </option>
                                                        <option value="height" nam="Height">
                                                            Height
                                                        </option>
                                                        <option nam="Length" value="length">
                                                          Length
                                                        </option>
                                                        <option nam="Material" value="material">
                                                          Material
                                                        </option>
                                                        <option nam="Pattren" value="pattren">
                                                          Pattren
                                                        </option>
                                                        <option nam="Scent" value="scent">
                                                            Scent
                                                        </option>
                                                        <option value="size" nam="Size">
                                                            Size
                                                        </option>
                                                        <option nam="Style" value="style">
                                                            Style
                                                        </option>
                                                        <option nam="Weight" value="weight">
                                                            Weight
                                                        </option>
                                                        <option nam="Width" value="width">
                                                            Width
                                                        </option>
                                                        <option nam="Device" value="device">
                                                            Device
                                                        </option>
                                          			</optgroup>
                                          		</select>
                                          	</div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                      	<button type="button" class="btn btn-dark" data-dismiss="modal">Save</button>
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Save and continue</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
      					</div>
      				</div>
      		</div>
      		<!-- End Inventory and pricing  -->
	    </div>
  </div>
</div>
@endsection
@section('script')
  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          $("#ui-id-1").addClass("list-group");
            $(function() {
              var projects = [
                 {
                    value: "Phone Cs in phone Cases",
                    desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
                 },
                 {
                    value: "Iphone Mobile",
                    desc: "<p class='p-graph'> Electornics ▸ Mobile phone ▸ Iphone</p>",
                 },
                 {
                    value: "wall decorators",
                    desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
                 },
                 {
                    value: "1 flat",
                    desc: "<p class='p-graph'>▸ Property ▸ Home ▸ flat </p>",
                 },
                 {
                    value: "Phone Cs in phone Cases",
                    desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
                 },
                 {
                    value: "Phone Cs in phone Cases",
                    desc: "<p class='p-graph'> Home & living ▸ Home Decor ▸ wall decor </p>",
                 },
              ];
              $( "#project" ).autocomplete({
                 minLength: 0,
                 source: projects,
                 focus: function( event, ui ) {
                    $( "#project" ).val( ui.item.label );
                       return false;
                 },
                 select: function( event, ui ) {
                    $( "#project" ).val( ui.item.label );
                    $( "#project-id" ).val( ui.item.value );
                    $( "#project-description" ).html( ui.item.desc );
                    return false;
                 }
              })
          
              .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                 return $( "<li class='list-group-item auto-list list-group-item-action'>" )
                 .append( "<a style='text-decoration:none;'>" + item.label + "<br>" + item.desc + "</a>" )
                 .appendTo( ul );
              };
              $("#ui-id-1").addClass("list-group");
              (".ui-helper-hidden-accessible").remove();
           });
      });
  </script>
@endsection
    
