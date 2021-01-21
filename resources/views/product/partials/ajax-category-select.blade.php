@if(!empty($category) && $category!=null)

<div class="resource-slider-item alldiv "  id="catdiv_{{$cat_count}}">
    <div class="card resource-slider-inset">
    <div class="card-content" style="border: 1px solid #ccc!important;">
    <div class="card-body" >
     <fieldset class="form-label-group form-group position-relative has-icon-left input-divider-left">
         <input onkeyup="search('sub_cat_input_{{$cat_count}}','category_ul_{{$cat_count}}')" type="text" class="form-control" id="sub_cat_input_{{$cat_count}}" placeholder="Search Desired Category">
         <div class="form-control-position">
             <i class="ficon feather icon-search"></i>
         </div>
        
     </fieldset>
   <fieldset class="form-group scrollerdiv" style="border: 1px solid #ccc!important;">
    
     <ul id="category_ul_{{$cat_count}}"  class="categoryUl"  style="list-style-type: none; padding-left: inherit;" >
        <input type="hidden" name="cate_id[]" value="{{$category_id}}">
        @foreach($category as $catRow )
         <li   class="catlogLi"><a class="dropdown-item" href="void:javascript()" onclick="category('{{$catRow->id}}','sub_category','catdiv_{{$cat_count}}','category_ul_{{$cat_count}}')" >{{$catRow->name}}</a></li>
         @endforeach
       
     </ul>
     </fieldset>
  </div>
 </div>
 </div>
  </div> 
  @endif