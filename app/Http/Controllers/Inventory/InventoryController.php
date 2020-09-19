<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VendorProduct;
use Carbon\Carbon;
use Auth;

class InventoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:vendor');
    }


    public function inventory_page(){
    	$data = VendorProduct::where('ven_id', Auth::guard('vendor')->user()->id)
    			->with(['get_product', 'get_product_variations'])
    			->orderBy('id', 'DESC')
    			->paginate(5);
    	return view('product.inventory', compact('data'));
    }


    public function update_inventory_data(Request $request){
    	if ($request->ajax()) {
    		$oldData = VendorProduct::where([
    			'id'=>decrypt($request->id),
    			'ven_id'=>Auth::guard('vendor')->user()->id
    		])->first();
    		if (!$oldData) {
    			return response()->json("Data Not Found", 404);
    		}

            //if mk_price
            if ($request->fieldName === "mk_price") {
                if (intval($oldData->price) > intval($request->value)) {
                    return response()->json("SORRY - Price can't be greater than RRP Price.", 422);
                }
            }
            //if price
            if ($request->fieldName === "price") {
                if (intval($request->value) > intval($oldData->mk_price)) {
                    return response()->json("SORRY - Price can't be greater than RRP Price.", 422);
                }
            }

    		$updated = $oldData->update([
    			$request->fieldName => $request->value,
    			'updated_at'=>Carbon::now()
    		]);

    		if ($updated == true) {
                //fetch updated data again
                $updatedData = VendorProduct::where([
                    'id'=>decrypt($request->id),
                    'ven_id'=>Auth::guard('vendor')->user()->id
                ])->first();

                if ($updatedData->quantity > 0 && $updatedData->mk_price > 0 && $updatedData->price > 0) {
                    if (intval($updatedData->active) === 0) {
                        //active row
                        $updatedData->update([
                            'active'=>1
                        ]);
                    }
                }else{
                   if (intval($updatedData->active) !== 0) {
                        //inactive row
                        $updatedData->update([
                            'active'=>0
                        ]);
                    } 
                }

    			$field = $request->fieldName === "mk_price" ? "RRP" : $request->fieldName;
    			return response()->json($field.' - updated successfully.', 200);
    		}else{
    			return response()->json('SORRY - Something went wrong.', 500);
    		}
    	}
    	return abort(404);
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
	                	->with(['get_product', 'get_product_variations'])
		                ->whereHas('get_product', function($q) use ($searchIn, $searchKey, $sort_by, $sorting_order)
		                {
		                    $q->where($searchIn, 'like', '%'.$searchKey.'%');
		                    $q->orderBy($sort_by, $sorting_order);

		                })->paginate($row_per_page);
	                return view('product.partials.inventory-list', compact('data'))->render();
            	}
                $data = VendorProduct::where('ven_id', Auth::guard('vendor')->user()->id)
                	->with(['get_product', 'get_product_variations'])
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
	            		->with(['get_product', 'get_product_variations'])
	            		->orderBy($sort_by, $sorting_order)
	            		->paginate($row_per_page);
	            return view('product.partials.inventory-list', compact('data'))->render();
            }
            $data = VendorProduct::where('ven_id', Auth::guard('vendor')->user()->id)
            			->with(['get_product', 'get_product_variations'])
            			->orderBy($sort_by, $sorting_order)
            			->paginate($row_per_page);
            return view('product.partials.inventory-list', compact('data'))->render();
        }
        return abort(404);
        
    }
}
