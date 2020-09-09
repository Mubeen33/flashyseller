<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VendorProduct;
use Auth;

class InventoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:vendor');
    }


    public function inventory_page(){
    	$data = VendorProduct::where('ven_id', Auth::guard('vendor')->user()->id)
    			->with(['get_product', 'get_variation'])
    			->orderBy('id', 'DESC')
    			->paginate(5);
    	return view('product.inventory', compact('data'));
    }



    //ajax pagination
    public function ajax_fetch_data(Request $request){
        if ($request->ajax()) {
            $searchIn = $request->search_in;
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $row_per_page = $request->row_per_page;
            $status = $request->status;

            if ($sort_by == "") {
                $sort_by = "id";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if (!empty($request->search_key)) {
            	if (intval($status) === 0 || intval($status) === 1) {
	            		$data = VendorProduct::where([
	            			['ven_id', '=', Auth::guard('vendor')->user()->id],
	            			['active', '=', $status]
	            		])
	                	->with(['get_product', 'get_variation'])
		                ->whereHas('get_product', function($q) use ($searchIn, $searchKey, $sort_by, $sorting_order)
		                {
		                    $q->where($searchIn, 'like', '%'.$searchKey.'%');
		                    $q->orderBy($sort_by, $sorting_order);

		                })->paginate($row_per_page);
	                return view('product.partials.inventory-list', compact('data'))->render();
            	}
                $data = VendorProduct::where('ven_id', Auth::guard('vendor')->user()->id)
                	->with(['get_product', 'get_variation'])
	                ->whereHas('get_product', function($q) use ($searchIn, $searchKey, $sort_by, $sorting_order)
	                {
	                    $q->where($searchIn, 'like', '%'.$searchKey.'%');
	                    $q->orderBy($sort_by, $sorting_order);

	                })->paginate($row_per_page);
                return view('product.partials.inventory-list', compact('data'))->render();
            }


            if (intval($status) === 0 || intval($status) === 1) {
            	$data = VendorProduct::where([
	            			['ven_id', '=', Auth::guard('vendor')->user()->id],
	            			['active', '=', $status]
	            		])
	            		->with(['get_product', 'get_variation'])
	            		->orderBy($sort_by, $sorting_order)
	            		->paginate($row_per_page);
	            return view('product.partials.inventory-list', compact('data'))->render();
            }
            $data = VendorProduct::where('ven_id', Auth::guard('vendor')->user()->id)
            			->with(['get_product', 'get_variation'])
            			->orderBy($sort_by, $sorting_order)
            			->paginate($row_per_page);
            return view('product.partials.inventory-list', compact('data'))->render();
        }
        return abort(404);
        
    }
}
