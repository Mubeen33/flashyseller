@if(isset($data))
    
        @foreach($data as $key=>$content)
            @if($content->get_product_variation)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        {{$content->get_product->title}} 
                        {{' | '.$content->get_product_variation->first_variation_value}}
                        @if($content->get_product_variation->second_variation_value !== NULL)
                        {{' - '.$content->get_product_variation->second_variation_value}}
                        @endif
                    </td>
                    <td><a href="{{ route('vendor.viewExistingProduct.get', encrypt($content->id)) }}" class="btn btn-warning btn-sm">Add</a></td>
                </tr>

                @else
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$content->get_product->title}}</td>
                    <td><a href="{{ route('vendor.viewExistingProduct.get', encrypt($content->id)) }}" class="btn btn-warning btn-sm">Add</a></td>
                </tr>
            @endif
        @endforeach


    @if(!empty($data))
    <tr>
        <td colspan="4">{!! $data->links() !!}</td>
    </tr>
    @endif
    
@endif