<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\VendorProduct;
use Auth;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth:vendor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::where([
                    'status'=>0,
                    'vendor_id'=>Auth::guard('vendor')->user()->id
                ])
                ->with(['get_customer', 'get_vendor_product'])
                ->orderBy('created_at', 'DESC')
                ->paginate(5);
        return view('orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //ajax fetch
    public function fetch_orders_list(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;

            if ($sort_by == "") {
                $sort_by = "created_at";
            }
            if ($sorting_order == "") {
                $sorting_order = "DESC";
            }

            if (!empty($request->search_key)) {
                $products = Product::where('title', 'LIKE', "%$searchKey%")->get('id');
                $productIDList = [];
                foreach ($products as $key => $value) {
                    $productIDList[] = $value->id;
                }
                $vendor_products = VendorProduct::whereIn('prod_id', $productIDList)
                                            ->where([
                                                'active'=>1,
                                                'ven_id'=>Auth::guard('vendor')->user()->id
                                            ])
                                            ->get('id');
                $ven_product_id_list = [];
                foreach ($vendor_products as $key => $value) {
                    $ven_product_id_list[] = $value->id;
                }


                $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where([
                            'status'=>0,
                            'vendor_id'=>Auth::guard('vendor')->user()->id
                        ])
                        ->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);

                
                return view('orders.partials.orders-list', compact('data'))->render();
            }

            $data = Order::where([
                            'status'=>0,
                            'vendor_id'=>Auth::guard('vendor')->user()->id
                        ])
                        ->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
            return view('orders.partials.orders-list', compact('data'))->render();
            
        }
        return abort(404);
    }
}
