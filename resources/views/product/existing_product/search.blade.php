@extends('layouts.master')
@section('page-title','Search Products')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/mediaquery.css')}}">

<style type="text/css">
    #searchKey__,
    #selected_row_per_page{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
    #searchKey__{
        width: 80%;
        margin-right: 5px;
    }
    
</style>
<style>
    .scrollerdiv {
         height: 300px;
         overflow-y: scroll;
         overflow-x: scroll;
     }
     .catlogLi{
         border-top: 1px solid rgba(34, 41, 47, 0.1);
                     
     }
    .cateActive{
     background: #7367F0;
     color: #FFFFFF !important;
    }
 </style>
 <style>
    #resource-slider {
      position: relative;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 100%;
      height: 13em;
      margin: auto;
      border-radius: 3px;
      background: #fff;
      border: 1px solid #DDD;
      overflow: hidden;
    }
    
    #resource-slider .arrow {
      cursor: pointer;
      position: absolute;
      width: 2em;
      height: 100%;
      padding: 0;
      margin: 0;
      outline: 0;
      background: transparent;
    }
    
    #resource-slider .arrow:hover {
      background: rgba(0, 0, 0, 0.1);
    }
    
    #resource-slider .arrow:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      width: 0.75em;
      height: 0.75em;
      margin: auto;
      border-style: solid;
    }
    
    #resource-slider .prev {
      left: 0;
      bottom: 0;
    }
    
    #resource-slider .prev:before {
      left: 0.25em;
      border-width: 3px 0 0 3px;
      border-color: #333 transparent transparent #333;
      transform: rotate(-45deg);
    }
    
    #resource-slider .next {
      right: 0;
      bottom: 0;
    }
    
    #resource-slider .next:before {
      right: 0.25em;
      border-width: 3px 3px 0 0;
      border-color: #333 #333 transparent transparent;
      transform: rotate(45deg);
    }
    
    #resource-slider .resource-slider-frame {
      position: absolute;
      top: 0;
      left: 2em;
      right: 2em;
      bottom: 0;
      border-left: 0.25em solid transparent;
      border-right: 0.25em solid transparent;
      overflow: hidden;
    }
    
    #resource-slider .resource-slider-item {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 25%;
      height: 100%;
    }
    
    #resource-slider .resource-slider-inset {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: 0.5em 0.25em;
      overflow: hidden;
    }
    
  
    </style>
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Home</a></li>
    <li class="breadcrumb-item active">Search existing Products</li>
@endsection 
@section('content')                                
            <div class="content-body">
                @include('msg.msg')
                <div class="row" id="basic-table">
                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Search Products</h4></div>
                                <div>
                                    <select id="selected_row_per_page" title="Display row per page">
                                        <option value="5" selected="1">Show 5</option>
                                        <option value="10">Show 10</option>
                                        <option value="15">Show 15</option>
                                        <option value="20">Show 20</option>
                                        <option value="25">Show 25</option>
                                        <option value="30">Show 30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <input type="text" id="searchKey__" placeholder="Search product" class="form-control">
                                        <button class="btn btn-warning btn-sm">Search</button>
                                      
                                    </div>
                                    <a href="void:javascript()" style="margin-left: 6.6%;">Add Existing Product</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                   
                    <div class="col-12">
                       
                            
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <div><h4 class="card-title">Search Products</h4></div>
                                
                            </div>
                        <div class="card-body" >
                            
                                <div class="row resources" >
                                            <div class="container"  id="resource-slider" >
                                                        <button class='arrow prev'></button>
                                                        <button class='arrow next' id="nextslider"></button>
                                                        <div class=" resource-slider-frame" id="categoryDivs">
                                                            @include('product.existing_product.partials.category-select')
                                                           
                                                        </div>
                                           </div>
                                </div>
                        </div>

                   </div>   
                   
                   </div>
                   
                    <div class="col-12" style="    margin-top: 6%;">
                        <div class="card">
                            <div class="card-header justify-content-between">
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="text-align: left !important;">

                                            <tbody id="render__data">
                                                @include('product.existing_product.partials.search-result')
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                    
                                    <input type="hidden" id="hidden__action_url" value="{{ route('vendor.searchExistingProduct.ajaxPgination') }}">
                                    <input type="hidden" id="hidden__page_number" value="1">
                                    <input type="hidden" id="hidden__sort_by" value="id">
                                    <input type="hidden" id="hidden__sorting_order" value="DESC">
                                    <input type="hidden" id="hidden__status" value="0">
                                    <input type="hidden" id="hidden__id" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
@endsection

@push('scripts')
<script>
 
</script>
<script type="text/javascript">
    $(document).on('change', '#hidden__id', function(e){
        e.preventDefault()
        let action_url = $("#hidden__action_url").val()
        let pageNumber = 1;
        let searchKey = $("#searchKey__").val()
        $("#hidden__page_number").val(pageNumber)
        let sort_by = $("#hidden__sort_by").val()
        let sorting_order = $("#hidden__sorting_order").val()
        let hidden__status = $("#hidden__status").val()
        let row_per_page = $("#selected_row_per_page").val()
        let hidden__id = $("#hidden__id").val()
        fetch_paginate_data(action_url, pageNumber, searchKey, sort_by, sorting_order, hidden__status, row_per_page, hidden__id);
    })
</script>
<script>
    function search(cat_input,cat_id) {
      // Declare variables
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById(cat_input);
      filter = input.value.toUpperCase();
      ul = document.getElementById(cat_id);
      li = ul.getElementsByTagName('li');
    
      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
    </script>
   
<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
<script>
    
    var cat_count =0; 
function category(catid,ulID,type){
    var typesuper=0;
    cat_count++;
    $('#'+type+'').nextAll('.alldiv').remove();
    $.ajax({
            
            url: "{{route('vendor.ajaxCategoryFind')}}",
            methods: "POST",           
            data:{id: catid,type: type,typesuper: typesuper,cat_count:cat_count},
            success: function(data){
               if(data==null){
               }
               else{
                   
                 $(data).appendTo("#categoryDivs");
                 $('#resource-slider .resource-slider-item').each(function(i) {
                 var $this = $(this),
                 left = $this.width() * i;
                 $this.css({
                  left: left
                  })
                 }); // end each
                 $('#nextslider').click();
               }
                
            }
        });
        if(typesuper==0){
        typesuper=1;
    }

}

    function defer(method) {
      if (window.jQuery)
        method();
      else
        setTimeout(function() {
          defer(method)
        }, 50);
    }
    defer(function() {
      (function($) {
        
        function doneResizing() {
          var totalScroll = $('.resource-slider-frame').scrollLeft();
          var itemWidth = $('.resource-slider-item').width();
          var difference = totalScroll % itemWidth;
          if ( difference !== 0 ) {
            $('.resource-slider-frame').animate({
              scrollLeft: '-=' + difference
            }, 500, function() {
              // check arrows
              checkArrows();
            });
          }
        }
        
        function checkArrows() {
          var totalWidth = $('#resource-slider .resource-slider-item').length * $('.resource-slider-item').width();
          var frameWidth = $('.resource-slider-frame').width();
          var itemWidth = $('.resource-slider-item').width();
          var totalScroll = $('.resource-slider-frame').scrollLeft();
          
          if ( ((totalWidth - frameWidth) - totalScroll) < itemWidth ) {
            $(".next").css("visibility", "visible");
          }
          else {
            $(".next").css("visibility", "visible");
          }
          if ( totalScroll < itemWidth ) {
            $(".prev").css("visibility", "visible");
          }
          else {
            $(".prev").css("visibility", "visible");
          }
        }
        
        $('.arrow').on('click', function() {
          var $this = $(this),
            width = $('.resource-slider-item').width(),
            speed = 500;
          if ($this.hasClass('prev')) {
            $('.resource-slider-frame').animate({
              scrollLeft: '-=' + width
            }, speed, function() {
              // check arrows
              checkArrows();
            });
          } else if ($this.hasClass('next')) {
            $('.resource-slider-frame').animate({
              scrollLeft: '+=' + width
            }, speed, function() {
              // check arrows
              checkArrows();
            });
          }
        }); // end on arrow click
        
        $(window).on("load resize", function() {
          checkArrows();
          $('#resource-slider .resource-slider-item').each(function(i) {
            var $this = $(this),
              left = $this.width() * i;
            $this.css({
              left: left
            })
          }); // end each
        }); // end window resize/load
        
        var resizeId;
        $(window).resize(function() {
            clearTimeout(resizeId);
            resizeId = setTimeout(doneResizing, 500);
        });
        
      })(jQuery); // end function
    });
   
    </script>
@endpush