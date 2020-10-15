@extends('layouts.master')

@section('content')
    <!-- Basic tabs start -->
    <section id="basic-tabs-components">
        <ul class="list-group list-group-horizontal-sm list-tab"  role="tablist" style="text-decoration:none; list-style:none; border-radius:5px;">
            <li>
                <a class="list-group-item order-pill active" id="home-tab" data-toggle="tab" href="#orders" aria-controls="home" role="tab" aria-selected="true">
                    Orders
                </a>
            </li>
            <li>
                <a class="list-group-item order-pill" id="profile-tab" data-toggle="tab" href="#drafts" aria-controls="profile" role="tab" aria-selected="false">Draft Shipment</a>
            </li>
            <li>
                <a class="list-group-item order-pill" id="about-tab" data-toggle="tab" href="#confrim" aria-controls="about" role="tab" aria-selected="false">Confirm Shipments</a>
            </li>
            <li>
                <a class="list-group-item order-pill" id="about-tab" data-toggle="tab" href="#shipped" aria-controls="about" role="tab" aria-selected="false">Shipped Shipments</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="orders" aria-labelledby="home-tab" role="tabpanel">
                  <div class="table-responsive">
                      <table class="table table-striped mb-0 table-bg">
                           <thead>
                                <tr class="table-head">
                                    <td width="15%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Due Date
                                    </td>
                                    <td width="25%">
                                        Product Title
                                    </td>
                                    <td width="25%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Qty Required
                                    </td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <!-- filters for table -->
                                <tr>
                                    <td width="15%">
                                        <select class="input-one">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="sku">
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- End filters -->
                                <!-- start List -->
                                <tr>
                                    <td width="15%">
                                        13 aug , 2020
                                    </td>
                                    <td width="25%">
                                         <img src="app-assets/images/elements/apple-watch.png" width="40"  height="40" /><font size="2">  Apple Watch series 4  </font>
                                    </td>
                                    <td width="25%">123456789123</td>
                                    <td width="10%">12345678</td>
                                    <td width="10%">
                                        1   
                                    </td>
                                    <td width="15%">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" n="1" id="cancle-order" href="#">
                                                    Cancle
                                                </a>
                                                <a class="dropdown-item" href="#">Proccess</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%">
                                        13 aug , 2020
                                    </td>
                                    <td width="25%">
                                         <img src="app-assets/images/elements/apple-watch.png" width="40"  height="40" /><font size="2">  Apple Watch series 4  </font>
                                    </td>
                                    <td width="25%">123456789123</td>
                                    <td width="10%">12345678</td>
                                    <td width="10%">
                                        1   
                                    </td>
                                    <td width="15%">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" n="1" id="cancle-order" href="#">
                                                    Cancle
                                                </a>
                                                <a class="dropdown-item" href="#">Proccess</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- end list -->
                            </tbody>
                      </table>
                  </div>
            </div>
            <div class="tab-pane" id="drafts" aria-labelledby="profile-tab" role="tabpanel">        
                <div class="table-responsive">
                      <table class="table table-striped mb-0 table-bg">
                           <thead>
                                <tr class="table-head">
                                    <td width="15%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Due Date
                                    </td>
                                    <td width="25%">
                                        Product Title
                                    </td>
                                    <td width="25%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Qty Required
                                    </td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <!-- filters for table -->
                                <tr>
                                    <td width="15%">
                                        <select class="input-one">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="sku">
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- End filters -->
                                <!-- start List -->
                                <tr>
                                    <td width="15%">
                                        13 aug , 2020
                                    </td>
                                    <td width="25%">
                                        <img src="app-assets/images/elements/apple-watch.png" width="40"  height="40" /><font size="2">  Apple Watch series 4  </font>
                                    </td>
                                    <td width="25%">123456789123</td>
                                    <td width="10%">12345678</td>
                                    <td width="10%">
                                        1   
                                    </td>
                                    <td width="15%">
                                        <button class="btn btn-danger btn-sm">Request Waybill</button>
                                    </td>
                                </tr>
                                <!-- end list -->
                            </tbody>
                      </table>
                </div>
            </div>
            <div class="tab-pane" id="confrim" aria-labelledby="about-tab" role="tabpanel">
                <div class="table-responsive">
                      <table class="table table-striped mb-0 table-bg">
                           <thead>
                                <tr class="table-head">
                                    <td width="15%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Due Date
                                    </td>
                                    <td width="25%">
                                        Product Title
                                    </td>
                                    <td width="25%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                                    </td>
                                    <td width="10%">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Qty Required
                                    </td>
                                    <td width="15%">Action</td>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <!-- filters for table -->
                                <tr>
                                    <td width="15%">
                                        <select class="input-one">
                                            <option>All</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td width="25%">
                                        <input type="text" class="input-one" name="sku">
                                    </td>
                                    <td width="10%">
                                        <input type="text" class="input-one" name="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!-- End filters -->
                                <!-- start List -->
                                <tr>
                                    <td width="15%">
                                        13 aug , 2020
                                    </td>
                                    <td width="25%">
                                         <img src="app-assets/images/elements/apple-watch.png" width="40"  height="40" /><font size="2">  Apple Watch series 4  </font>
                                    </td>
                                    <td width="25%">123456789123</td>
                                    <td width="10%">12345678</td>
                                    <td width="10%">
                                        1   
                                    </td>
                                    <td width="15%">
                                        <button class="btn btn-primary btn-sm">
                                            Print Shipment
                                        </button>
                                    </td>
                                </tr>
                                <!-- end list -->
                            </tbody>
                      </table>
                </div>
            </div>
            <div class="tab-pane" id="shipped" role="tabpanel" aria-labelledby="dropdown31-tab" aria-expanded="false">
                <p>Cake croissant lemon drops gummi bears carrot cake biscuit cupcake croissant. Macaroon lemon drops
                    muffin jelly sugar plum chocolate cupcake danish icing. Soufflé tootsie roll lemon drops sweet roll
                    cake icing cookie halvah cupcake.</p>
            </div>
        </div>
    </section>
    <!-- Basic Tag Input end -->   
<script type="text/javascript">        
$(function(){
  $('#cancle-order').on('click', function () {
    var n = $(this).attr("n");
      Swal.fire({
        title: 'Are you sure You want to cancle Order?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        confirmButtonClass: 'btn btn-warning',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,         
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            type: "success",
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            confirmButtonClass: 'btn btn-success',
          })
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your imaginary file is safe :)',
            type: 'error',
            confirmButtonClass: 'btn btn-success',
          })
        }
      })
  });
});
</script>  
@endsection