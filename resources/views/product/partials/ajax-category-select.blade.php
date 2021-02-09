@if(!empty($category) && $category!=null)

<div class="resource-slider-item alldiv "  id="catdiv_{{$cat_count}}">
    <div class="card resource-slider-inset">
    <div class="card-content" style="border: 1px solid #ccc!important; ">
    <div class="card-body" style="padding: 0.3rem !important;">
     <fieldset class="form-label-group form-group position-relative has-icon-left input-divider-left" style="margin-bottom: 0.2rem;">
         <input onkeyup="search('sub_cat_input_{{$cat_count}}','category_ul_{{$cat_count}}')" type="text" class="form-control" id="sub_cat_input_{{$cat_count}}" >
         <div class="form-control-position">
             <i class="ficon feather icon-search"></i>
         </div>
        
     </fieldset>
   <fieldset class="form-group scrollerdiv slimScrol" style="margin-bottom: 0rem !important;">
    
     <ul id="category_ul_{{$cat_count}}"  class="categoryUl"  style="list-style-type: none; padding-left: inherit; margin-bottom: 0rem;" >
        <input type="hidden" name="cate_id[]" value="{{$category_id}}">
        @foreach($category as $catRow )
                  @php
                   $title_sub=null;
                   if(strlen($catRow->name)>=30){
                      $title_sub= substr($catRow->name,0,30).'...';
					}else{
                        $title_sub=$catRow->name;
                    }
                   @endphp
         <li   class="catlogLi" ><a class="dropdown-item"  style="padding: 0.4rem 0.4rem;" href="javascript:void(0)" onclick="category('{{$catRow->id}}','sub_category','catdiv_{{$cat_count}}','category_ul_{{$cat_count}}','{{$catRow->name}}')" title="{{$catRow->name}}">{{$title_sub}}</a></li>
         @endforeach
       
     </ul>
     </fieldset>
  </div>
 </div>
 </div>
  </div> 
  @endif