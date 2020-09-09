@foreach($data as $key=>$content)
<tr>
    <th scope="row">{{ $key+1 }}</th>                                          
    <td>{{ $content->title }}</td>
    <td>
        {{ $content->get_category->name }}
    </td>
    <td>
        @if(!$content->get_images->isEmpty())
            @foreach($content->get_images as $key=>$image)
            @if($key == 0)
            <img src="{{ $image }}" width="100px" height="80px">
            @endif
            @endforeach
        @endif
    </td>
    <td>{{ $content->made_by }}</td>
    <td>{{ $content->product_type }}</td>
    <td>
          {{ $content->created_at->format('d/m/Y') }}
    </td>
    <td>
        <span class="badge badge-danger">Pending</span>
    </td>
    <td>
        <div class="btn-group">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle mr-1" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actions
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                    <a class="dropdown-item" href="{{ route('vendor.productDetails.get', encrypt($content->id)) }}">Show</a>
                </div>
            </div>
        </div>
        
    </td>
</tr>
@endforeach
<tr>
    <td colspan="9">{!! $data->links() !!}</td>
</tr>