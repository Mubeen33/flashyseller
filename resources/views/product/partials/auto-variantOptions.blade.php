@if(isset($options))
	
	@if(count($options) > 0)
		<div id="first_variation" class="col-lg-6" style="min-height: 150px;">
			<label>{{ $variationName }}</label>
			<span><a href="" onclick="removeFirstVariation()">Delete</a></span><br>
			<select class="form-control" onchange="getSecondOptions(this.value)">
				<option>Select Options</option>
				@foreach($options as $option)
					<option value="{{$option->id}}">{{$option->option_name}}</option>
				@endforeach		
			</select><br><br>
			<select class="form-control" name="variation" onchange="getSecondVariant(this.value)">
                <option>Choose Variation Type</option>
                <optgroup label="Variation Type">
                    @foreach($variationList as $variation)
                        @if($variation->variation_name !== $variationName)
		                      <option value="{{$variation->id}}">
		                        {{$variation->variation_name}}
		                      </option>
    					@endif
                    @endforeach
                </optgroup>
            </select>
		</div>
		<input type="hidden" class="first_variation" name="first_variation" value="{{$variationName}}">
	@else
			<div id="first_variation" class="col-lg-6" style="min-height: 150px;">
				<label id="">{{ $variationName }}</label><span><a href="" onclick="removeFirstVariation()">Delete</a></span><br><br>

				<select class="form-control" name="variation" onchange="getSecondVariant(this.value)">
                <option>Choose Variation Type</option>
                <optgroup label="Variation Type">
                    @foreach($variationList as $variation)
                    	@if($variation->variation_name !== $variationName)
		                      <option value="{{$variation->id}}">
		                        {{$variation->variation_name}}
		                      </option>
    					@endif      
                    @endforeach
                </optgroup>
            </select>
			</div>
			<div class="col-lg-3" id="firstDataRow">
				<input type="text" value="" data-role="tagsinput" >
			</div>
			<div class="col-lg-2">
				<button class="btn btn-warning" type="button" onclick="addnewDataRow()">Add</button>
			</div>
			<input type="hidden" class="first_variation" name="first_variation" value="{{$variationName}}">
	@endif
@endif