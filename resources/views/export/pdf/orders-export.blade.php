<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Orders List - Flashybuy</title>

    <style>
      .document--body{
        margin: 0px;
        padding: 10px;
      }
      .main--content{}
      .header-part{
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 3px solid #ddd
      }
      .header-part h2{
        padding: 0;
        margin: 0;
      }
      .logo{
        text-align: center;
        margin-bottom: 10px
      }


      .data--list{
        padding-top: 50px;
      }
      .data--list table{
        width: 100%;
        text-align: center;
      }
      .data--list table thead{
        background: #565656;
      }
      .data--list table thead th{
        color: #fff;
        padding: 5px 2px;

      }
      .data--list table tbody tr td{
        font-size: 14px;
        border-bottom: 1px solid #ddd;
        padding: 5px 2px;
      }
      /* 
      thead {display: table-header-group;}
      tfoot {display: table-header-group;} 
      */
    </style>
  </head>
  <body>

    <div class="document--body">

      <div class="main--content">
        <div class="header-part">
          <div class="logo">
            <img height="32px" width="156px" src="{{ public_path('assets/logo.png') }}">
          </div>

          <h2>Product List</h2>
          <span>
            <small>Export Date : <?php echo date('d/m/Y H:m');?></small>
          </span>
        </div> <!-- .header-part end here -->
      </div> <!-- .main--content end here -->

      <div style="clear:both"></div>

      <div class="data--list">

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Category</th>
              <th>Description</th>
              <th>Image</th>
              <th>Product Type</th>
              <th>SKU</th>
            </tr>
          </thead>

          <tbody>
          @foreach($data as $key=>$content)
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
                                                    <button class="btn btn-warning btn-sm"><a href="{{ route('vendor.orderAction.post', [encrypt($key), 'process']) }}" style="color:#fff">Ready To Collect</a></button>
                                                </div>
                                            </div>
                                        </td>   
                                </tr>
                            @foreach($content as $order)    
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
                                    <td width="15%">
                                        @if($order->status !== "Canceled")    
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>    
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" n="1" id="cancle-order" href="{{ Route('vendor.orders.order-cancelled',encrypt($order->id)) }}">
                                                        Cancle
                                                    </a>
                                                </div>
                                        @else
                                            <div class="chip chip-danger">
                                                <div class="chip-body">
                                                    <div class="chip-text">Order Cancelled</div>
                                                </div>
                                            </div>
                                        @endif    
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach  
          </tbody>
        </table>

      </div> <!-- .data--list end here -->

      <div style="clear:both"></div>
     </div> <!--.document--body end here -->

  </body>
</html>