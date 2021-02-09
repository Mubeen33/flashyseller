
    
<div class="resource-slider-item alldiv "  id="supperParent">
    <div class="card resource-slider-inset">
        <div class="card-content">
           <div class="card-body" style="border: 1px solid #ccc!important; padding: 0.3rem !important;">
               <fieldset class="form-label-group form-group position-relative has-icon-left input-divider-left" style="margin-bottom: 0.2rem;">
                   <input onkeyup="search('maincatsearch','maincategory')" type="text" class="form-control" id="maincatsearch" >
                   <div class="form-control-position">
                       <i class="ficon feather icon-search"></i>
                   </div>
                  
               </fieldset>
             <fieldset class="form-group scrollerdiv slimScrol" style="margin-bottom: 0rem !important;">
              @if(!empty($categoryList))
               <ul id="maincategory"   class="categoryUl"  style="list-style-type: none; padding-left: inherit;" >
                   @foreach($categoryList as $catRow )
                   @php
                   $title_sub=null;
                   if(strlen($catRow->name)>=30){
                      $title_sub= substr($catRow->name,0,30).'...';
					}else{
                        $title_sub=$catRow->name;
                    }
                   @endphp
                   <li   class="catlogLi"><a class="dropdown-item"  style="padding: 0.4rem 0.4rem;"  href="javascript:void(0)" onclick="category('{{$catRow->id}}','category','supperParent','maincategory','{{$catRow->name}}')" title="{{$catRow->name}}">{{$title_sub}}</a></li>
                   @endforeach
                 
               </ul>
               @endif
               </fieldset>
            </div>
       </div>
    </div>
</div>

