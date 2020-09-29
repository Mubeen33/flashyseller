<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use App\Product;
use App\Category;
use App\ProductMedia;
use App\CustomField;
use App\Variation;
use App\ProductCustomField;
use App\ProductVariation;
use App\VariantOptionOptions;
use App\VariationOption;
use App\ProductWarranty;
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

    	$variationList = Variation::where('active',1)->get();
    	return view('product.addproduct',compact('variationList'));
        
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
    // addProduct

    public function addProduct(Request $request){

        // dd($request);
    	$product = new Product();

    	$product->title        = $request->title;
    	$product->category_id  = $request->category_id;
    	$product->description  = $request->description;
    	$product->image_id     = $request->image_id;
    	$product->what_is_it   = $request->what_is_it;
    	$product->made_date    = $request->made_date;
    	$product->made_by      = $request->made_by;
    	$product->renewal      = $request->renewal;
    	$product->product_type = $request->product_type;
    	$product->sku          = $request->sku;
        $product->width          = $request->width;
        $product->hieght          = $request->hieght;
        $product->length          = $request->length;
        if ($request->has('warranty')) {
            $product->warranty          = $request->warranty;
        }    
    	$product->vendor_id    = Auth::id();
    	$product->video_link   = $request->video_link;
        $product->slug         = str_replace(" ","-", $request->title);

        // generating mannual Id

          $today     = date('YmdHi');
          $startDate = date('YmdHi', strtotime('2012-03-14 09:06:00'));
          $range     = $today - $startDate;
          $tsnid     = rand(0, $range);
        // 

        $product->tsnid = $tsnid;

    	$product->save();

    	$Id = $product->id;

    	if ($request['element_0']) {
    		
    		$data = array();
	        $i = 0;

	        foreach (json_decode(CustomField::where('category_id', $request->category_id)->first()->options) as $key => $element) {
	        	
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
    	if ($request->has('variation_name')) {
            
            $count        = count($request->variation_name);
            if ($count == 1) {

                foreach ($request->variant_combinations as $key => $value) {
                    
                    $productVariations = new ProductVariation();

                    $productVariations->first_variation_name  = $request->variation_name[0];
                    $productVariations->first_variation_value = $request->variant_combinations[$key];
                    $productVariations->sku                   = $request->variant_sku[$key];
                    $productVariations->product_id            = $Id;

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
                    $productVariations->product_id             = $Id;

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
    	
    	return redirect()->back()->with('msg','<div class="alert alert-success" id="msg">Product added Successfully!</div>');

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
}
