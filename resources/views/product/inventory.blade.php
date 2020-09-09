@extends('layouts.master')
@push('styles')
<style type="text/css">
  .searchKey__{
    outline: none;
  }
  input,
  select{
    outline: none;
    border:1px solid #ddd;
  }
</style>
@endpush

@section('content')
 <!-- Basic tabs start -->
  <section id="basic-tabs-components">
    <div id="display--actions-msg">

      <div class="error--msg"></div>

      <div class="success--msg"></div>

    </div>




      <ul class="list-group list-group-horizontal-sm list-tab"  role="tablist" style="text-decoration:none; list-style:none; border-radius:5px;">
          <li>
              <a class="list-group-item order-pill active" id="home-tab" data-toggle="tab" href="#orders" aria-controls="home" role="tab" aria-selected="true">
                  Manage My Offers
              </a>
          </li>
          <li>
              <a class="list-group-item order-pill" id="profile-tab" data-toggle="tab" href="#drafts" aria-controls="profile" role="tab" aria-selected="false">
                  View Bulk Results
              </a>
          </li>
          <li>
              <a class="list-group-item order-pill" id="about-tab" data-toggle="tab" href="#confrim" aria-controls="about" role="tab" aria-selected="false">Request Product Edit</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane active" id="orders" aria-labelledby="home-tab" role="tabpanel">
              <br />
              <button class="btn mb-1 btn-primary btn-sm waves-effect waves-light">
                  Export My Offers
              </button>
              <button class="btn mb-1 btn-primary btn-sm  waves-effect waves-light">
                  Download Blank Template
              </button>
              <button class="btn mb-1 btn-primary btn-sm  waves-effect waves-light">
                  Bulk Uplo   ads
              </button>
              <button class="btn mb-1 btn-primary btn-sm  waves-effect waves-light">
                  Create Removal Order
              </button>
              <br />
              <div class="table-responsive">
                  <table class="table table-striped mb-0 table-bg">
                      <thead>
                          <tr class="table-head">
                              <td width="100px" class="sortAble" sorting-column='active' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>
                                  <i class="fa fa-info-circle" aria-hidden="true"></i> Status
                              </td>
                              <td width="300px">
                                  Product Title
                              </td>
                              <td width="100px">
                                  <i class="fa fa-info-circle" aria-hidden="true"></i> SKU
                              </td>
                              <td width="80px">
                                  <i class="fa fa-info-circle" aria-hidden="true"></i> QTY
                              </td>
                              <td width="150px">
                                  <i class="fa fa-info-circle" aria-hid den="true"></i> Product ID
                              </td>
                              <td width="200px">
                                  <i class="fa fa-info-circle" aria-hidden="true"></i>Sales 30 days
                              </td>
                              <td width="150px">
                                  <i class="fa fa-info-circle" aria-hidden="true"></i> 
                                  Selling Price
                              </td>
                              <td width="100px">
                                  <i class="fa fa-info-circle" aria-hidden="true"></i> RRP
                              </td>
                              <td width="150px">
                                  Dispatch Days
                              </td>
                              <td width="100px">
                                  Action
                              </td>
                          </tr>
                      </thead>
                      <tbody class="table-body">
                              <!-- Search -->
                              <tr>
                                  <td width="100px">
                                      <select id="hidden__status" class="input-four">
                                          <option value="3">All</option> <!-- view all -->
                                          <option value="1">Active</option>
                                          <option value="0">On Hold</option>
                                      </select>
                                  </td>
                                  <td width="300px">
                                     <input type="text" class="input-one searchKey__" search-in="title" placeholder="Search title" value="">
                                  </td>
                                  <td width="100px">
                                      <input type="text" class="input-two searchKey__" search-in="sku" placeholder="Search SKU" value="">
                                  </td>
                                  <td width="80px"></td>
                                  <td width="150px">
                                      <input type="text" class="input-three searchKey__" search-in="id" placeholder="Search ID" value="">
                                  </td>
                                  <td width="100px"></td>
                                  <td width="150px"></td>
                                  <td width="100px"></td>
                                  <td width="150px">
                                      <select name="all">
                                          <option>All</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                      </select>
                                  </td>
                                  <td width="100px">
                                    <select id="selected_row_per_page" title="Display row per page">
                                        <option value="5" selected="1">Show 5</option>
                                        <option value="10">Show 10</option>
                                        <option value="15">Show 15</option>
                                        <option value="20">Show 20</option>
                                        <option value="25">Show 25</option>
                                        <option value="30">Show 30</option>
                                    </select>
                                  </td>
                              </tr>
                              <!-- end search -->
                      </tbody>

                      <tbody id="render__data">
                        <!-- start list -->
                        @include('product.partials.inventory-list')
                        <!-- end list -->
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="tab-pane" id="drafts" aria-labelledby="profile-tab" role="tabpanel">       <h2>View Bulk Result</h2>
          </div>
          <div class="tab-pane" id="confrim" aria-labelledby="about-tab" role="tabpanel">
              <h2>Request Product Edit</h2>
          </div>
      </div>
  </section>

  <input type="hidden" id="hidden__action_url" value="{{ route('vendor.inventory.ajaxPgination') }}">
  <input type="hidden" id="hidden__page_number" value="1">
  <input type="hidden" id="hidden__sort_by" value="id">
  <input type="hidden" id="hidden__sorting_order" value="DESC">
  <input type="hidden" id="hidden__id" value="">

  <!-- Basic Tag Input end -->
@endsection




@push("scripts")
<script type="text/javascript">
  $(document).ready(function(){
    $("#render__data").on("change", ".updateByOnChange", function(){
      let fieldName = $(this).attr('name')
      let rowID = $(this).attr('row-id')
      let value = $(this).val()
      let token = $('meta[name="csrf-token"]').attr('content')

      if (value != "") {
        $.ajax({
          url:"{{ route('vendor.updateInventoryData.post') }}",
          method:"POST",
          data:{_token:token, fieldName:fieldName, id:rowID, value:value},
          dataType:'JSON',
          cache:false,
          success:function(response){
            $("#display--actions-msg .success--msg").html("<div class='alert alert-success alert-dismissible fade show' role='alert'> <span>"+response+"</span> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>");
            $('html, body').animate({
                  scrollTop: $("#display--actions-msg").offset().top
              }, 1000);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 422) {
                alert('Sorry\n'+ jqXHR.responseText)
                //window.location.reload(true)
            }if (jqXHR.status === 404) {
               $("#display--actions-msg .error--msg").html("<div class='alert alert-success alert-dismissible fade show' role='alert'> <span>"+jqXHR.responseText+"</span> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>");
               $('html, body').animate({
                  scrollTop: $("#display--actions-msg").offset().top
              }, 1000);
            }else if (jqXHR.status === 500) {
                alert('Sorry\n'+ jqXHR.responseText)
                window.location.reload(true)
            }else{
                alert('Sorry\n Something unknown problem')
                //window.location.reload(true)
            }

        }
        })
      }

    })
  })
</script>


<script type="text/javascript" src="{{ asset('js/ajax-pagination-type-2.js') }}"></script>
@endpush