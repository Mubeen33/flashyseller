@foreach($data as $key=>$content)
<tr>    
    <td>{{ $key }}</td>
    @foreach($content as $order)
    <td>{{ $order->product_name }}</td>
    @endforeach
</tr>
@endforeach
<tr>
    <td colspan="14">{{-- {!! $data->links() !!} --}}</td>
</tr>