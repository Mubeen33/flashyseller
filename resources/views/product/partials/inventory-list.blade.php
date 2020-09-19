@foreach($data as $key=>$content)
<tr>
  <td align="center" width="100px">
    @if($content->active == 0)
      <div class="chip chip-danger">
          <div class="chip-body">
              <div class="chip-text">On hold</div>
          </div>
      </div>
      @else
      <div class="chip chip-success">
          <div class="chip-body">
              <div class="chip-text">Active</div>
          </div>
      </div>
    @endif

  </td>
  <td width="300px" align="left">
    @php
      $getProductImage = (\App\ProductMedia::where('image_id', $content->get_product->image_id)->first());
    @endphp

    @if(!$content->get_product_variations)
        @if($getProductImage)
        <img src="{{$getProductImage->image}}" width="40"  height="40" /><font size="2">  {{\Str::words($content->get_product->title, 4)}} </font>
        @endif

      
      @else
        @if($content->get_product_variations->variant_image !== NULL)
          <img src="{{$content->get_product_variations->variant_image}}" width="40"  height="40" />
          <font size="2">  
            {{\Str::words($content->get_product->title, 4)}} {{', '.$content->get_product_variations->first_variation_value}}
            @if($content->get_product_variations->second_variation_value !== NULL)
              {{', '.$content->get_product_variations->second_variation_value}}
            @endif
          </font>
        @else
          <img src="{{$getProductImage->image}}" width="40"  height="40" />
          <font size="2">  
            {{\Str::words($content->get_product->title, 4)}} {{', '.$content->get_product_variations->first_variation_value}}
            @if($content->get_product_variations->second_variation_value !== NULL)
              {{', '.$content->get_product_variations->second_variation_value}}
            @endif
          </font>
      @endif
    @endif

  </td>
  <td width="100px" align="center">
      {{$content->get_product->sku}}
  </td>
  <td align="center" width="80px">
     <input type="number" class="input-two inp-c updateByOnChange" id="floating-label1"  value="{{$content->quantity}}" name="quantity" row-id="{{encrypt($content->id)}}">
  </td>
  <td width="150px" class="list-size" align="center">
     {{$content->get_product->id}}
  </td>
  <td width="100px" class="list-size" align="center" width="100px">
      0
  </td>
  <td width="150px">
      <input type="number" class="input-three inp-c updateByOnChange" name="price" value="{{$content->price}}" row-id="{{encrypt($content->id)}}" />
  </td>
  <td width="100px" align="center">
      <input type="text" class="input-one inp-c updateByOnChange" name="mk_price" value="{{$content->mk_price}}" row-id="{{encrypt($content->id)}}">
  </td>
  <td width="150px">
    @php
      $dispatchDays = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
    @endphp
      <select class="updateByOnChange" name="dispatched_days" row-id="{{encrypt($content->id)}}">
          <option>None</option>
          @foreach($dispatchDays as $day)
            <option value="{{$day}}" @if($day == $content->dispatched_days) selected @endif>{{$day}}</option>
          @endforeach
      </select>
  </td>
  <td width="100px">
      <div class="dropdown">
          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Action
          </button>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Report</a>
              <a class="dropdown-item" href="#">Update</a>
          </div>
      </div>
  </td>
</tr>
@endforeach

<tr>
  <td colspan="10">{!! $data->links() !!}</td>
</tr>