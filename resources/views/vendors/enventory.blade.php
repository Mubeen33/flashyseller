@extends('layouts.master')
@section('content')
 <!-- Basic tabs start -->
  <section id="basic-tabs-components">
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
                              <td width="100px">
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
                                      <select class="input-four" name="select">
                                          <option>All</option>
                                          <option>Active</option>
                                          <option>Completed</option>
                                      </select>
                                  </td>
                                  <td width="300px">
                                     <input type="text" class="input-one" name="">
                                  </td>
                                  <td width="100px">
                                      <input type="text" class="input-two" name="">
                                  </td>
                                  <td width="80px"></td>
                                  <td width="150px">
                                      <input type="text" class="input-three" name="">
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
                                  <td width="100px"></td>
                              </tr>
                              <!-- end search -->
                               <!-- start list -->
                              <tr>
                                  <td align="center" width="100px">
                                      <div class="chip chip-danger">
                                          <div class="chip-body">
                                              <div class="chip-text">on hold</div>
                                          </div>
                                      </div>
                                  </td>
                                  <td width="300px" align="left">
                                    <img src="app-assets/images/elements/apple-watch.png" width="40"  height="40" /><font size="2">  Apple Watch series 4  </font>
                                  </td>
                                  <td width="100px" align="center">
                                      <input type="text" class="input-one inp-c" name="">
                                  </td>
                                  <td align="center" width="80px">
                                     <input type="number" class="input-two inp-c" id="floating-label1"  value="0" name="">
                                  </td>
                                  <td width="150px" class="list-size" align="center">
                                     2445454
                                  </td>
                                  <td width="100px" class="list-size" align="center" width="100px">
                                      0
                                  </td>
                                  <td width="150px">
                                      <input type="number" class="input-three inp-c" name="" />
                                  </td>
                                  <td width="100px" align="center">
                                      <input type="text" class="input-one inp-c" name="">
                                  </td>
                                  <td width="150px">
                                      <select name="dispatchdays">
                                          <option>None</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
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
  <!-- Basic Tag Input end -->
@endsection