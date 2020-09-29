@if(isset($productWarranty))
@php 
	$productWarranty = explode(',', $productWarranty->warranty);
	
	  
	@endphp
<div class="col-lg-3">
     <div class="mb-xs-2 strong"> Warranty  </div>

</div>	
<div class="col-lg-3" >
<select class="form-control" name="warranty">
	
	@foreach($productWarranty as $value)
		<option value="{{$value}}">{{$value}}</option>
	@endforeach
</select>
                  </div>

@endif