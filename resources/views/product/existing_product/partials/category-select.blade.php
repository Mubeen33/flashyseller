
    
<div class="resource-slider-item alldiv "  id="supperParent">
    <div class="card resource-slider-inset">
        <div class="card-content">
           <div class="card-body" style="border: 1px solid #ccc!important;">
               <fieldset class="form-label-group form-group position-relative has-icon-left input-divider-left">
                   <input onkeyup="search('maincatsearch','maincategory')" type="text" class="form-control" id="maincatsearch" placeholder="Search Desired Category">
                   <div class="form-control-position">
                       <i class="ficon feather icon-search"></i>
                   </div>
                  
               </fieldset>
             <fieldset class="form-group scrollerdiv" style="border: 1px solid #ccc!important;">
              @if(!empty($category))
               <ul id="maincategory"  class="categoryUl"  style="list-style-type: none; padding-left: inherit;" >
                   @foreach($category as $catRow )
                   <li   class="catlogLi"><a class="dropdown-item" href="void:javascript()" onclick="category('{{$catRow->id}}','category','supperParent')" >{{$catRow->name}}</a></li>
                   @endforeach
                 
               </ul>
               @endif
               </fieldset>
            </div>
       </div>
    </div>
</div>

