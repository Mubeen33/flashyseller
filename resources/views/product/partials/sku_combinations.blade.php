@if(count($combinations[0]) > 0)


	<table class="table table-bordered">
		<thead>
			<tr>
				<td class="text-center">
					<label for="" class="control-label">{{__('Variant')}}</label>
				</td>
				<td class="text-center">
					<label for="" class="control-label">{{__('SKU')}}</label>
				</td>
			@if($count===1)	
				@if( $variationOne->image_approval === 1)	
					<td class="text-center">
						<label for="" class="control-label">{{__('Variant Image')}}</label>
					</td>
				@endif
			@else
			
				@if( $variationOne->image_approval === 1 || $variationTwo->image_approval === 1)

					<td class="text-center">
						<label for="" class="control-label">{{__('Variant Image')}}</label>
					</td>
				@endif
			@endif		
			</tr>
		</thead>
		<tbody>


@foreach ($combinations as $key => $combination)
	@php
		

		$str = '';
		$sku = '';
		foreach ($combination as $key => $item){
			if($key > 0 ){
				$str .= '-'.str_replace(' ', '', $item);
				$sku .='-'.str_replace(' ', '', $item);
			}
			else{
				
					$str .= str_replace(' ', '', $item);
					$sku .='-'.str_replace(' ', '', $item);
				
			}
		}
	@endphp
	@if(strlen($str) > 0)
			<tr>
				<td>
					<label for="" class="control-label">{{ $str }}</label>
					<input type="hidden" name="variant_combinations[]" value="{{$str}}">
				</td>
				<td>
					<input type="text" name="variant_sku[]" value="{{ $sku }}" class="form-control" required>
				</td>
				@if($count===1)
					@if( $variationOne->image_approval === 1)
						<td>
							<input type="file" name="variant_image[]" class="form-control" required>
						</td>
					@endif
				@else
					@if( $variationOne->image_approval === 1 || $variationTwo->image_approval === 1)
						<td>
							<input type="file" name="variant_image[]" class="form-control" required>
						</td>
					@endif
				@endif		
			</tr>
	@endif
@endforeach
	</tbody>
</table>
@endif
