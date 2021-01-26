<?php

namespace App\Http\Controllers\product;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use App\Product;
use App\VendorProduct;
use App\Category;
use App\ProductMedia;
use App\CustomField;
use App\Variation;
use App\ProductCustomField;
use App\ProductVariation;
use App\VariantOptionOptions;
use App\VariationOption;
use App\ProductWarranty;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }
    // 
    public function index(){
        $categoryList=Category::where("parent_id",0)->get();
    	$variationList = Variation::where('active',1)->get();
    	return view('product.addproduct',compact('variationList','categoryList'));
        
    }
    // product Images
	public function addProductImages(Request $request,$product_image_id) 
	{
        $validate = Validator::make($request->all(), [
            'fileDropzone'=>'required|image|mimes:png,jpeg,jpg,gif'
        ]);
        if ($validate->fails()) {
            return response()->json('Please upload valid image', 422);
        }
		
        $image = $request->file('fileDropzone');
		
		$file_name=uniqid().(Auth::guard('vendor')->user()->id).$product_image_id."_300_".$image->getClientOriginalName();
		$is_present=ProductMedia::where(['image'=>$file_name,'image_id'=>$product_image_id])->get();
		
        if(count($is_present) > 0){
			return;
		}

        //resize image
        $image_resize = Image::make($image->getRealPath());              
        $image_300 = $image_resize->resize(300, 300);
        $image_300->save('product_images/'.$file_name);

		$product_image = new ProductMedia;
		$product_image->image_id = $product_image_id;
		$product_image->image = url('/')."/product_images/".$file_name;
		$product_image->save();

		$success_message = array('success'=>200,
			'filename' => $file_name,
		);
		return json_encode($success_message);
		
	 }
	 
	 public function removeProductImage(Request $request) {
        
		ProductMedia::where('image', $request->name)->delete();
		$image_path = public_path()."/product_images/".$request->name;
		@unlink($image_path);
		return "Image deleted successfully";
	 }

     // 

    public function getCategories(Request $request){

    	if ($request->ajax()) {

    		$searchKey = $request->search_key;

    		$categories = Category::where("name", "LIKE", "%$searchKey%")->get();

    		return view('product.partials.auto-category', compact('categories'))->render();
    	}
    }

    // get getCustomFields

    public function getCustomFields(Request $request){

    	if ($request->ajax()) {

    		$categoryId   = $request->categoryId;
    		$customFields = CustomField::where("category_id", $categoryId)->get();

    		return view('product.partials.auto-customfields', compact('customFields'))->render();
    	}
    }

    // ajax-get-variant-options

    public function getVariationsOptions(Request $request){

    	if ($request->ajax()) {

    		$variation_id  = $request->variation_id;
    		$variationName = Variation::where('id',$variation_id)->value('variation_name');
    		$options       = VariationOption::where('variation_id',$variation_id)->where('active',1)->get();

			$variationList = Variation::where('active',1)->get();
			
			return response()->json(array(
				'second_variations' => $options,
				'variationName' => $variationName,
				'variationList' => $variationList
			));

    		//return view('product.partials.auto-variantOptions', compact('options','variationName','variationList'))->render();

    	}

    } 

    //
    // getSecondVariationsOptions

    public function getSecondVariationsOptions(Request $request){

    		$variation_id  = $request->variation_id;
    		$variationName = Variation::where('id',$variation_id)->value('variation_name');
    		$options       = VariationOption::where('variation_id',$variation_id)->where('active',1)->get();

    		$variationList = Variation::where('active',1)->get();
            return view('product.partials.auto-variantOptions2', compact('options','variationName','variationList'))->render();
    }


    public function getThirdVariationsOptions(Request $request) {
        $variation_id  = $request->variation_id;
        $variation = DB::table('variant_options_options')->where('option_id', $variation_id)->get();
        return response()->json(array(
            'variation3' => $variation
        ));
    }
    //

    
    public function skuCombinations(Request $request){

        $options = Array();
        $variations = Array();
        $variantOne;
        $variantTwo;
        $count;
        if($request->has('choice_no')){
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('|', $request[$name]);
                array_push($options, explode(',', $my_str));
            }
        }
        if ($request->has('variation_name')) {
            
            $count        = count($request->variation_name);
            if ($count == 1) {
                
                    $variantOne   = $request->variation_name[0];
                    $variationOne = Variation::where('variation_name',$variantOne)->first();
            }
            else{

                $variantOne   = $request->variation_name[0];
                $variationOne = Variation::where('variation_name',$variantOne)->first();
                $variantTwo   = $request->variation_name[1];
                $variationTwo = Variation::where('variation_name',$variantTwo)->first();

            }
            

        }

        $combinations = combinations($options);
        if ($count == 1) {
            return view('product.partials.sku_combinations', compact('combinations','variationOne','count'));
        }else{

            return view('product.partials.sku_combinations', compact('combinations','variationOne','variationTwo','count'));
        }    
    } 
    // 
    public function getWarranty(Request $request){

        if ($request->ajax()) {

            $categoryId   = $request->categoryId;
            $productWarranty = ProductWarranty::where("category_id", $categoryId)->first();

            return view('product.partials.auto-warranty', compact('productWarranty'))->render();
        }
    }
    // 
    // addProduct title,categories and customfields start
    private function addProductTitle($request){
            $category=null;
            $category_id=null;
            if(!empty($request->input('cate_id'))){
                $categoryArr=$request->input('cate_id');
             for($i=0;$i<count($categoryArr); $i++) {
                 if($i==0){
                    $category=$categoryArr[$i];
                 }else{
                    $category.=','.$categoryArr[$i];
                 }
                }
             $category_id=array_values(array_slice($request->input('cate_id'), -1))[0];
             $request->session()->put('add_pro_category_id', $category_id);
            }
            
            $product = new Product();
            if(!empty($category) && !empty($request->input('cate_id'))){
                $newSlug=Str::slug($request->input('title'), '-');
               
                $product->title        = $request->input('title');
                $product->category_id  = $category;
                $product->image_id     = $request->input('image_id');
                $product->slug         = $newSlug.'-'.$this->uniqueSlug();
                $product->vendor_id    = Auth::id();
                 //$product->video_link   = $request->video_link;
               // generating mannual Id
                $today     = date('YmdHi');
                $startDate = date('YmdHi', strtotime('2012-03-14 09:06:00'));
                $range     = $today - $startDate;
                $tsnid     = rand(0, $range);
                //generating mannual Id end  
                $product->tsnid = $tsnid;
                $product->save();
                
                $Id = $product->id;
                
                //custome fields start
                 if ($request['element_0']) {
                        
                        $data = array();
                        $i = 0;
                        
                        foreach (json_decode(CustomField::where('category_id', $category_id)->first()->options) as $key => $element) {
                            
                            $item = array();
                            if ($element->type == 'text') {
                                $item['type'] = 'text';
                                $item['label'] = $element->label;
                                $item['value'] = $request['element_'.$i];
                            }
                            elseif ($element->type == 'select' || $element->type == 'radio') {
                                $item['type'] = 'select';
                                $item['label'] = $element->label;
                                $item['value'] = $request['element_'.$i];
                            }
                            elseif ($element->type == 'multi_select') {
                                $item['type'] = 'multi_select';
                                $item['label'] = $element->label;
                                $item['value'] = json_encode($request['element_'.$i]);
                            }
                            elseif ($element->type == 'file') {
                                $item['type'] = 'file';
                                $item['label'] = $element->label;
                                $item['value'] = $request['element_'.$i]->move('product_images/media',$request['element_'.$i]);
                            }
                            array_push($data, $item);
                            $i++;
                        }
    
                        $productCustomFields = new ProductCustomField();
                        $productCustomFields->product_id = $Id;
                        $productCustomFields->customfields = json_encode($data);
                        $productCustomFields->save();
                    }
                
            }
            $responseData=array(
    
                'product_id' => encrypt($Id),
                'msg' => 'Product Created Successfully'
            );
           
            return json_encode($responseData);
           
            
    }
    // addProduct title,categories and customfields end
    //update current product code start
    private function updateCurrentProduct($request){
        $category=null;
            $category_id=null;
            if(!empty($request->input('cate_id'))){
                $categoryArr=$request->input('cate_id');
             for($i=0;$i<count($categoryArr); $i++) {
                 if($i==0){
                    $category=$categoryArr[$i];
                 }else{
                    $category.=','.$categoryArr[$i];
                 }
                }
             $category_id=array_values(array_slice($request->input('cate_id'), -1))[0];
             $request->session()->put('add_pro_category_id', $category_id);
            }
            
           
            $prodID=decrypt($request->input('productId'));
            $product = Product::where('id',$prodID)->first();
            
            if(!empty($category) && !empty($request->input('cate_id'))){
                $newSlug=Str::slug($request->input('title'), '-');
                
                $product->title        = $request->input('title');
                $product->image_id     = $request->input('image_id');
                $product->category_id  = $category;
                $product->slug         = $newSlug.'-'.$this->uniqueSlug();
                $product->save();
                
                //custome fields start
                 if ($request['element_0']) {
                        
                        $data = array();
                        $i = 0;
                        
                        foreach (json_decode(CustomField::where('category_id', $category_id)->first()->options) as $key => $element) {
                            
                            $item = array();
                            if ($element->type == 'text') {
                                $item['type'] = 'text';
                                $item['label'] = $element->label;
                                $item['value'] = $request['element_'.$i];
                            }
                            elseif ($element->type == 'select' || $element->type == 'radio') {
                                $item['type'] = 'select';
                                $item['label'] = $element->label;
                                $item['value'] = $request['element_'.$i];
                            }
                            elseif ($element->type == 'multi_select') {
                                $item['type'] = 'multi_select';
                                $item['label'] = $element->label;
                                $item['value'] = json_encode($request['element_'.$i]);
                            }
                            elseif ($element->type == 'file') {
                                $item['type'] = 'file';
                                $item['label'] = $element->label;
                                $item['value'] = $request['element_'.$i]->move('product_images/media',$request['element_'.$i]);
                            }
                            array_push($data, $item);
                            $i++;
                        }
    
                        $productCustomFields =ProductCustomField::where('product_id',$prodID)->first();;
                        $productCustomFields->product_id = $prodID;
                        $productCustomFields->customfields = json_encode($data);
                        $productCustomFields->save();
                    }
                
            }
            $responseData=array(
    
                'product_id' => encrypt($prodID),
                'msg' => 'Product Updated Successfully'
            );
           
            return json_encode($responseData);
           
         
    }
    //update current product code end
    //main addproduct action
    public function addProduct(Request $request){
        //
       // $product->product_type = $request->product_type;
      
      //  title,category and custom fields form data submit
         if(!empty($request->input('action')) && $request->input('action')=='titleForm' && empty($request->input('productId')) && $request->input('productId')=='')
         {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:80|min:10',
                'cate_id' => 'required',
               
            ]);
            if($validator->fails()){
                $allErorrs=$validator->errors();
                $responseData=array(
                    'titleError'=>$allErorrs->first('title'),
                    'categoryError' =>$allErorrs->first('cate_id'),
                    'msg' => 'Product Not Updated'
                );
                return json_encode($responseData);
            }else{
                return $this->addProductTitle($request);
            }
            
           
      
         }
        if(!empty($request->input('action')) && $request->input('action')=='titleForm' && !empty($request->input('productId')) && $request->input('productId')!='')
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:80|min:10',
                'cate_id' => 'required',
               
            ]);
            if($validator->fails()){
                $allErorrs=$validator->errors();
                $responseData=array(
                    'titleError'=>$allErorrs->first('title'),
                    'categoryError' =>$allErorrs->first('cate_id'),
                    'msg' => 'Product Not Updated'
                );
                return json_encode($responseData);
            }else{
            return $this->updateCurrentProduct($request);
            }   
        }

        if(!empty($request['action']) && $request['action']=='descriptionfrm' && !empty($request['description']) && !empty($request['productId']))
        {
            
            $prodID=decrypt($request['productId']);
            $product = Product::where('id',$prodID)->first();
            $product->description  = $request['description'];
            if($product->save()){
                $responseData=array(
    
                    'product_id' => encrypt($prodID),
                    'msg' => 'Product Description Updated Successfully'
                );
               
                return json_encode($responseData);
            }else{
                $responseData=array(
    
                    'product_id' => encrypt($prodID),
                    'msg' => 'Product Description Not Updated'
                );
               
                return json_encode($responseData);
            }
        }


       
        
        if(!empty($request->input('action')) && $request->input('action')=='choice_form' && !empty($request->input('productId')) && $request->input('productId')!='')
        {
            $prodID=decrypt($request->input('productId'));
           $validator = Validator::make($request->all(), [
              
               'width' => 'required|max:10|min:1',
               'hieght' => 'required|max:10|min:1',
               'length' => 'required|max:10|min:1',
              
           ]);
           if($validator->fails()){
               $allErorrs=$validator->errors();
               $responseData=array(
                 
                   'width' =>$allErorrs->first('width'),
                   'hieght' => $allErorrs->first('hieght'),
                   'length' => $allErorrs->first('length'),
                  
               );
               return json_encode($responseData);
           }else{
         
           $product = Product::where('id',$prodID)->first();
          
           $product->sku= $request->sku;
           $product->width= $request->width;
           $product->hieght= $request->hieght;
           $product->length= $request->length;
           if($product->save()){
               if ($request->has('variation_name')) {
                 
                   $count= count($request->variation_name);
                   if ($count == 1) {
                       //check veratrine available or not
                       $productVeriant = ProductVariation::where('product_id',$prodID)->first();
                      
                       if(!empty($productVeriant->product_id)){
                           ProductVariation:: where('product_id',$prodID)->delete();
                       }
                           
                       foreach ($request->variant_combinations as $key => $value) {
                           
                           $productVariations = new ProductVariation();
       
                           $productVariations->first_variation_name  = $request->variation_name[0];
                           $productVariations->first_variation_value = $request->variant_combinations[$key];
                           $productVariations->sku                   = $request->variant_sku[$key];
                           $productVariations->product_id            = $prodID;
       
                           if ($request->has('variant_image')) {
                               
                               $image = $request->file('variant_image')[$key];
               
                               $file_name=uniqid().(Auth::guard('vendor')->user()->id)."_300_".$image->getClientOriginalName();
                               //resize image
                               $image_resize = Image::make($image->getRealPath());              
                               $image_300 = $image_resize->resize(300, 300);
                               $image_300->save('product_images/'.$file_name);
       
                               $productVariations->variant_image = url('/')."/product_images/".$file_name;
                           }
       
                           $productVariations->save();
                           
       
                       }
                   }
                   if ($count == 2) {
                       $productVeriant = ProductVariation::where('product_id',$prodID)->first();
                      
                       if(!empty($productVeriant->product_id)){
                           ProductVariation:: where('product_id',$prodID)->delete();
                       }
                       foreach ($request->variant_combinations as $key => $value) {
                           
                           $variants = $request->variant_combinations[$key];
                           $variants = explode("-",$variants);
                           $first_variation_value = $variants[0];
                           $second_variation_value = $variants[1];
       
                           $productVariations = new ProductVariation();
       
                           $productVariations->first_variation_name   = $request->variation_name[0];
                           $productVariations->first_variation_value  = $first_variation_value;
                           $productVariations->second_variation_name  = $request->variation_name[1];
                           $productVariations->second_variation_value = $second_variation_value;
                           $productVariations->sku                    = $request->variant_sku[$key];
                           $productVariations->product_id             = $prodID;
       
                           if ($request->has('variant_image')) {
                               
                               $image = $request->file('variant_image')[$key];
               
                               $file_name=uniqid().(Auth::guard('vendor')->user()->id)."_300_".$image->getClientOriginalName();
                               //resize image
                               $image_resize = Image::make($image->getRealPath());              
                               $image_300 = $image_resize->resize(300, 300);
                               $image_300->save('product_images/'.$file_name);
       
                               $productVariations->variant_image = url('/')."/product_images/".$file_name;
                           }
       
                           $productVariations->save();
                           
       
                       }
                   }
               }
                   $responseData=array(
   
                       'product_id' => encrypt($prodID),
                       'msg' => 'Product Inventory Updated Successfully'
                   );
                   return json_encode($responseData);
               
              
              
           
           }else{
               $responseData=array(
   
                   'product_id' => encrypt($prodID),
                   'msg' => 'Product Inventory Not Updated'
               );
              
               return json_encode($responseData);
           }
          }
        }
      
        
       
    	
        // if ($request->has('warranty')) {
        //     $product->warranty = $request->warranty;
        // }    
    	//insert veriations in 
    	
    	
    //	return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Product added Successfully!</div>');

    }



    //get pending products
    public function get_pending(){

        $data = Product::where([
            'vendor_id'=>Auth::guard('vendor')->user()->id,
            'approved'=>0,
            'disable'=>0
        ])
        ->with(['get_category', 'get_images'])
        ->paginate(5);

        return view('product.pending', compact('data'));
    }

    public function product_details($id){
        $data = Product::where([
            'id'=>decrypt($id),
            'vendor_id'=>Auth::guard('vendor')->user()->id,
        ])
        ->with(['get_category', 'get_images'])
        ->first();
        if (!$data) {
            return abort(404);
        }
        return view('product.show', compact('data'));
    }


    public function fetch_data(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if ($request->search_key != "") {
                $data = Product::where([
                    'vendor_id'=>Auth::guard('vendor')->user()->id,
                    'approved'=>$status,
                    'disable'=>0,//not disable
                ])
                ->where("title", "LIKE", "%$searchKey%")
                ->orWhere("created_at", "LIKE", "%$searchKey%")
                ->orderBy($sort_by, $sorting_order )
                ->paginate($row_per_page );
                return view('product.partials.pending-product-list', compact('data'))->render();
            }
            $data = Product::where([
                        'vendor_id'=>Auth::guard('vendor')->user()->id,
                        'approved'=>$status,
                        'disable'=>0,//not disable
                    ])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page );
            return view('product.partials.pending-product-list', compact('data'))->render();
        }
        return abort(404);
    
    }



    /*=========== existing product search, view and add ========= */
    //search_existing_product
    public function search_existing_product(){
        $data['category']=Category::where("parent_id",0)->get();
       
        return view('product.existing_product.search',$data);
    }
    public function ajax_category_find(Request $request){
       if(!empty($_GET)){
        $data['category'] = Category::where("parent_id", $_GET['id'])->get();
        $data['cat_count'] = $_GET['cat_count'];
        if(empty(count($data['category']))){
            $category_veriation = Variation::where("category_id", $_GET['id'])->first();
            $categoryVer='no';
            if(!empty($category_veriation->category_id)){
                $categoryVer='yes';
            }
             $responseData=array(
                    'veriant' => $categoryVer,
                    'catID' => '<input class="alldiv" type="hidden" name="cate_id[]" value="'.$_GET['id'].'" >'
                );
                
            return $responseData;
        }
        else{
            
            $data['category_id'] = $_GET['id'];
            return view('product.partials.ajax-category-select',$data);

        }
       }else{
           return null;
       }
         
    }
    public function ajax_fetch_existing_products(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if (!empty($request->search_key)) {
                $products = Product::where("title", "LIKE", "%$searchKey%")->get('id');
                //get vendor products
                $product_id_list = [];
                foreach ($products as $key => $value) {
                   $product_id_list[] = $value->id;
                }
                $vendors_products = VendorProduct::whereIn('prod_id', $product_id_list)
                            ->where([
                                ['active', '=', 1],
                                ['ven_id', '!=', Auth::guard('vendor')->user()->id]
                            ])
                            ->get();


                $get_id_list = [];

                foreach ($vendors_products as $key => $value) {
                    $result = $this->check_array_values($value);
                    if ($result === false) {
                        $get_id_list[] = $value->id;
                    }
                }


                
                //get vendor products
                $data = VendorProduct::whereIn('id', $get_id_list)
                            ->where([
                                ['active', '=', 1],
                                ['ven_id', '!=', Auth::guard('vendor')->user()->id]
                            ])
                            ->with(['get_product', 'get_product_variations'])
                            ->orderBy('id', 'DESC')
                            ->paginate($row_per_page);

                return view('product.existing_product.partials.search-result', compact('data'))->render();
            }else{
                $data = [];
                return view('product.existing_product.partials.search-result', compact('data'))->render();
            }
            
        }
        return abort(404);
    }

    private function check_array_values($value){
        $data = VendorProduct::where([
            'ven_id'=>Auth::guard('vendor')->user()->id,
            'prod_id'=>$value->prod_id,
            'variation_id'=>$value->variation_id
        ])->first();
        if (!$data) {
            return false;
        }else{
            return true;
        }

    }

    public function view_existing_product($vendor_products_tbl_id){
        $data = VendorProduct::where('id', decrypt($vendor_products_tbl_id))
                            ->where([
                                ['active', '=', 1],
                                ['ven_id', '!=', Auth::guard('vendor')->user()->id]
                            ])
                            ->with(['get_product', 'get_product_variations'])
                            ->first();
        if (!$data) {
            return abort(404);
        }
        return view('product.existing_product.view', compact('data'));
    }


    public function save_existing_product(Request $request, $id){
        $this->validate($request, [
            'quantity'=>'required|numeric|min:1',
            'market_price'=>'required|numeric|min:1',
            'price'=>'required|numeric|min:1',
            'dispatched_days'=>'required|numeric|min:1'
        ]);
        $authVendorID = Auth::guard('vendor')->user()->id;

        //the reference id is the id of vendor_products tbl
        $vendor_product_data = VendorProduct::where([
                ['id', '=', decrypt($id)],
                ['ven_id', '!=', $authVendorID],
                ['active', '=', 1]
            ])->first();

        if (!$vendor_product_data) {
            return redirect()->back()->withInput()->with('error', 'Invalid Product');
        }

        //if mk_price
        if (intval($request->price) > intval($request->market_price)) {
            return redirect()->back()->withInput()->with('error', "SORRY - Price can't be greater than Market Price.");
        }
        

        //check duplicacy
        $checkData = VendorProduct::where([
                ['ven_id', '=', $authVendorID], 
                ['prod_id', '=', $vendor_product_data->prod_id],
                ['variation_id', '=', $vendor_product_data->variation_id]
            ])->first();

        if ($checkData) {
            return redirect()->back()->withInput()->with('error', 'Invalid Access! The product has been already added.');
        }

        //insert
        $inserted = VendorProduct::insert([
            'ven_id'=>$authVendorID,
            'prod_id'=>$vendor_product_data->prod_id,
            'variation_id'=>$vendor_product_data->variation_id,
            'quantity'=>$request->quantity,
            'mk_price'=>$request->market_price,
            'price'=>$request->price,
            'dispatched_days'=>$request->dispatched_days,
            'active'=>1,
            'created_at'=>Carbon::now()
        ]);

        if ($inserted == true) {
            return redirect()->route('vendor.searchExistingProduct.get')->with('success', 'Product added successfully');
        }
        return redirect()->back()->withInput()->with('error', "Something went wrong.");
    }
    public function uniqueSlug(){
        $today = date("d-m-Y");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $Slugid = $rand.$today ;
        return $Slugid;
    }
}
