@if(isset($shippedShippmentsOrders))
@foreach($shippedShippmentsOrders as $key=>$content)
                                @foreach($content as $order)
                                    
                                @endforeach
                                <tr style="background: aliceblue;">
                                    <td width="15%">
                                       Date : {{ $order->created_at }}
                                    </td>
                                    <td width="25%" colspan="1">Order Id# {{ $order->order_id }}</td>
                                    <td width="10%" colspan="3">Order Total : {{ $order->grand_total }}</td>
                                    <td width="15%">
                                        <div class="dropdown">
                                                <button class="btn btn-primary btn-sm"><a href="" style="color:#fff">Print Waybill</a></button>
                                            </div>
                                        </div>
                                    </td>   
                                </tr> 
                                @foreach($content as $order)
                                    @if($order->status != "Canceled")            
                                    <tr>
                                        <td width="15%">
                                        {{ $order->created_at->toDateString() }}
                                        </td>
                                        <td width="25%">
                                             <img src="{{ $order->product_image }}" width="40"  height="40" /><font size="2">  {{ $order->product_name }}  </font>
                                        </td>
                                        <td width="25%">
                                            @php
                                                $sku = (App\Product::where('id',$order->product_id)->value('sku'));
                                            @endphp
                                            {{ $sku }}
                                        </td>
                                        <td width="10%">{{ $order->product_id }}</td>
                                        <td width="10%">
                                            {{ $order->qty }}   
                                        </td>
                                        <td width="8%"></td>
                                    </tr>
                                    @endif
                                @endforeach    
                            @endforeach
@endif                            