@if(count($combinations[0]) > 0)

@php 
$countBTN=0;
@endphp
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
			{{-- {{$count}} --}}
				@if( $variationOne->image_approval == 1)	
					<td class="text-center">
						<label for="" class="control-label">{{__('Variant Image')}}</label>
					</td>
				@endif
			@else
			
				@if( $variationOne->image_approval == 1 || $variationTwo->image_approval == 1)

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
					$sku .= str_replace(' ', '', $item);
				
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
					@if( $variationOne->image_approval == 1)
						<td style="max-width: 2px;">
							
							<div class="form-group">
								<div >
									<img style="max-width: 37%; margin-bottom: 3%;" class="cardimg" id='img-upload{{$countBTN}}'/>
									</div>
                                <div id="input-group{{$countBTN}}" >
                                    <span class="input-group-btn">
                                        <span id="btn-file{{$countBTN}}" class="btn btn-warning  waves-effect waves-light btn-file">
                                            Browse<input  id="imgInp{{$countBTN}}"  type="file" name="variant_image[]" class="form-control" accept="image/*" required>
                                        </span>
                                    </span>
                                    <input type="text"  class="form-control hidden"  readonly>
                                </div>
                               
							</div>

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('change', '#btn-file{{$countBTN}} :file', function() {
			var input = $(this),
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [label]);
		});
	
		$('#btn-file{{$countBTN}} :file').on('fileselect', function(event, label) {
	
			var input = $(this).parents('#input-group{{$countBTN}}').find(':text'),
				log = label;
	
			if (input.length) {
				input.val(log);
			} else {
				if (log) alert(log);
			}
	
		});
	
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
	
				reader.onload = function(e) {
					$('#img-upload{{$countBTN}}').attr('src', e.target.result);
				}
	
				reader.readAsDataURL(input.files[0]);
			}
		}
	
		$("#imgInp{{$countBTN}}").change(function() {
			readURL(this);
		});
	});
	</script>

						</td>
					@endif
				@else
					@if( $variationOne->image_approval == 1 || $variationTwo->image_approval == 1)
						<td style="max-width: 2px;">
							<div class="form-group">
								<div >
									<img style="max-width: 37%; margin-bottom: 3%;" class="cardimg" id='img-upload{{$countBTN}}'/>
								</div>
                                <div id="input-group{{$countBTN}}" >
                                    <span class="input-group-btn">
                                        <span id="btn-file{{$countBTN}}" class="btn btn-warning  waves-effect waves-light btn-file">
                                            Browse<input  id="imgInp{{$countBTN}}"  type="file" name="variant_image[]" class="form-control" accept="image/*" required>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control hidden"  readonly>
                                </div>
                               
							</div>
						
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('change', '#btn-file{{$countBTN}} :file', function() {
			var input = $(this),
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [label]);
		});
	
		$('#btn-file{{$countBTN}} :file').on('fileselect', function(event, label) {
	
			var input = $(this).parents('#input-group{{$countBTN}}').find(':text'),
				log = label;
	
			if (input.length) {
				input.val(log);
			} else {
				if (log) alert(log);
			}
	
		});
	
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
	
				reader.onload = function(e) {
					$('#img-upload{{$countBTN}}').attr('src', e.target.result);
				}
	
				reader.readAsDataURL(input.files[0]);
			}
		}
	
		$("#imgInp{{$countBTN}}").change(function() {
			readURL(this);
		});
	});
	</script>

						</td>
					@endif
				@endif	
				@php
				$countBTN++;
				@endphp	
			</tr>
	@endif
@endforeach
	</tbody>
</table>
@endif

