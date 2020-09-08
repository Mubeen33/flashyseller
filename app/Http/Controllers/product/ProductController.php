<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Category;
use App\ProductMedia;
use App\CustomField;
use App\Variation;
use App\ProductCustomField;
use App\VariantOptionOptions;
use App\VariationOption;

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
		$image = $request->file('fileDropzone');
		
		$file_name=$product_image_id.'_'.$image->getClientOriginalName();
		$is_present=ProductMedia::where(['image'=>$file_name,'image_id'=>$product_image_id])->get();
		if(count($is_present) > 0){
			return;
		}
		if($image->move(public_path()."\product_images",$file_name)){
			$product_image = new ProductMedia;
			$product_image->image_id = $product_image_id;
			$product_image->image = $file_name;
			$product_image->save();

			$success_message = array( 'success' => 200,
				'filename' => $file_name,
			);
			return json_encode($success_message);
		}
	 }
	 
	 public function removeProductImage(Request $request) {
		ProductMedia::where('image', $request->name)->delete();
		$image_path = public_path()."\product_images/".$request->name;
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

    		return view('product.partials.auto-variantOptions', compact('options','variationName','variationList'))->render();

    	}

    } 

    //
    // getSecondVariationsOptions

    public function getSecondVariationsOptions(Request $request){

    		$variation_id  = $request->variation_id;
    		$variationName = Variation::where('id',$variation_id)->value('variation_name');
    		$options       = VariationOption::where('variation_id',$variation_id)->where('active',1)->get();

    		$variationList = Variation::where('active',1)->get();
    }
    // 
    // addProduct

    public function addProduct(Request $request){

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
    	$product->vendor_id    = Auth::id();
    	$product->video_link   = $request->video_link;

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
    	else{


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
