
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
							<td style="width: 15%;">
								
								<div class="form-group">
									<div class="imgicon" >
										<div class="imgdivtrash" id="imgicon-upload{{$countBTN}}">
										<img src="{{ asset('images/upld.png') }}" style="max-width: 100%; " class="cardimg " id='img-upload{{$countBTN}}'/>
									    </div>
										<a href="javascript:void(0)" style="display: none;" id="trashicon{{$countBTN}}" onclick="removeImgVer('img-upload{{$countBTN}}','imgInp{{$countBTN}}','trashicon{{$countBTN}}','{{ asset('images/upld.png') }}')" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o imageTrashTag"></i></a>	
									
									</div>
									<div id="input-group{{$countBTN}}" style="margin-top: -38%;">
										<span class="input-group-btn">
											<span id="btn-file{{$countBTN}}" style="width: 0%;" class=" waves-effect waves-light btn-file">
												<i class="fa fa-file" aria-hidden="true"></i>
												<input  id="imgInp{{$countBTN}}"  type="file" name="variant_image[]" class="form-control " accept="image/*" required>
											</span>
										</span>
										<input type="text"  class="form-control hidden"  readonly>
									</div>
							
								</div>
	
	<script type="text/javascript">
		$("#imgicon-upload{{$countBTN}}").click(function(event) {
		var previewImg = $(this).children("#img-upload{{$countBTN}}");
	
		$('#imgInp{{$countBTN}}').trigger("click");
			
	
			$('#imgInp{{$countBTN}}').change(function() {
				var reader = new FileReader();
				$('#trashicon{{$countBTN}}').css('display', 'flex');
				reader.onload = function(e) {
					var urll = e.target.result;
					$(previewImg).attr("src", urll);
					previewImg.parent().css("background", "transparent");
					previewImg.show();
					previewImg.siblings("p").hide();
				};
				reader.readAsDataURL(this.files[0]);
			});
	});
		</script>
	
							</td>
						@endif
					@else
						@if( $variationOne->image_approval == 1 || $variationTwo->image_approval == 1)
							<td style="width: 15%;">
								<div class="form-group">
									<div class="imgicon" >
										<div id="imgicon-upload{{$countBTN}}">
											<img src="{{ asset('images/upld.png') }}" style="width: 100%;" class="cardimg imgdivtrash" id='img-upload{{$countBTN}}'/>
											<a href="javascript:void(0)" style="display: none;" id="trashicon{{$countBTN}}" onclick="removeImgVer('img-upload{{$countBTN}}','imgInp{{$countBTN}}','trashicon{{$countBTN}}','{{ asset('images/upld.png') }}')" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o imageTrashTag"></i></a>	
										
										</div>
									</div>
									<div id="input-group{{$countBTN}}" style="margin-top: -38%;">
										<span class="input-group-btn">
											<span id="btn-file{{$countBTN}}" style="width: 0%;" class=" waves-effect waves-light btn-file">
												<input  id="imgInp{{$countBTN}}"  type="file" name="variant_image[]" class="form-control" accept="image/*" required>
											</span>
										</span>
										<input type="text" class="form-control hidden"  readonly>
									</div>
								   
								</div>
							
								<script type="text/javascript">
									$("#imgicon-upload{{$countBTN}}").click(function(event) {
									var previewImg = $(this).children("#img-upload{{$countBTN}}");
								
									$('#imgInp{{$countBTN}}').trigger("click");
										
								
										$('#imgInp{{$countBTN}}').change(function() {
											var reader = new FileReader();
								            $('#trashicon{{$countBTN}}').css('display', 'flex');
											reader.onload = function(e) {
												var urll = e.target.result;
												$(previewImg).attr("src", urll);
												previewImg.parent().css("background", "transparent");
												previewImg.show();
												previewImg.siblings("p").hide();
											};
											reader.readAsDataURL(this.files[0]);
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
	{{-- <script>
		function removeImgVer(img,inputfile,trashIcon){
			var urll="{{ asset('images/upld.png') }}";
			$('#'+img).attr("src",urll);
		    $('#'+inputfile).val(''); 
			$('#' + trashIcon).css('display', 'none');
		}
	</script> --}}
	