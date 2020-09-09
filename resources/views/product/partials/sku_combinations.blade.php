@if(isset($variation))

	<tr>
		<td><input type="text" class="form-control" name="first_variation_value[]" value="{{ $option }}"></td>
		@if($variation->sku_approval==1)
			<td><input type="text" class="form-control" name="sku[]" ></td>
		@endif
		@if($variation->image_approval==1)
			<td><input type="file" class="form-control" name="variant_image[]"></td>
		@endif		
	</tr>

@endif
