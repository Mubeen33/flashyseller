<?php
namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\VendorProduct;
use Auth;
use PDF;


class OrderController extends Controller
{
    

    public function __construct(){

        $this->middleware('auth:vendor');
        
         //300 seconds = 5 minutes
        ini_set('max_execution_time', '300');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   = Order::where([
                    'vendor_id'=>Auth::guard('vendor')->user()->id
                ])
                ->orderBy('created_at', 'DESC')
                ->where('order_ship_draft','No')
                ->where('status','!=','Canceled')
                ->get()->groupby('order_id');        
        return view('orders.vendorsOrder', compact('data'));
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

            if (empty($sort_by)) {
                $sort_by = "created_at";
            }
            if (empty($sorting_order)) {
                $sorting_order = "DESC";
            }

            $authVendorID = Auth::guard('vendor')->user()->id;

            if (!empty($searchKey)) {
                $ven_product_id_list = [];
                $productIDList = [];

                //if search key only contain numeric

                if (is_numeric($searchKey)) {
                    //search order ID
                    $order_id_list = Order::where('order_id', 'LIKE', "%$searchKey%")
                                            ->where('vendor_id', '=', $authVendorID)
                                            ->get('vendor_product_id');
                    foreach ($order_id_list as $key => $value) {
                        $ven_product_id_list[] = $value->vendor_product_id;
                    }
                    $product_id_list = Product::where('id', 'LIKE', "%$searchKey%")->get('id');
                    foreach ($product_id_list as $key => $value) {
                        $productIDList[] = $value->id;
                    }
                }

                //products

                $products = Product::where('title', 'LIKE', "%$searchKey%")->get('id');
                foreach ($products as $key => $value) {
                    $productIDList[] = $value->id;
                }

                //vendor products

                $productIDList = array_unique($productIDList);
                $vendor_products = VendorProduct::whereIn('prod_id', $productIDList)
                                            ->where([
                                                'active'=>1,
                                                'ven_id'=>$authVendorID
                                            ])
                                            ->get('id');
                
                foreach ($vendor_products as $key => $value) {
                    $ven_product_id_list[] = $value->id;
                }


                //unique the array - the id list of vendor_products tbl id
                
                $ven_product_id_list = array_unique($ven_product_id_list);

                //if have status
                if (!empty($status)) {
                    $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where([
                            'vendor_id'=>$authVendorID,
                            'status'=>$status
                        ])
                        ->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                    return view('orders.partials.orders-list', compact('data'))->render();
                }

                $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where('vendor_id', $authVendorID)
                        ->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }


            //without search key

            //if only have status
            if (!empty($status)) {
                $data = Order::where([
                        'vendor_id'=>$authVendorID,
                        'status'=>$status
                    ])
                    ->with(['get_customer', 'get_vendor_product'])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }

            $data = Order::where('vendor_id', $authVendorID)
                        ->with(['get_customer', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
            return view('orders.partials.orders-list', compact('data'))->render();
            
        }
        return abort(404);
    }



    //order_status_update
    public function order_status_update($orderID, $status){

        if ($status === "process") {

            $order = Order::where('order_id',decrypt($orderID))->get();

            foreach ($order as $key => $value) {
                
                if ($value->status !== 'Canceled') {
                    
                    Order::where(['id'=>$value->id, 'vendor_id'=>Auth::guard('vendor')->user()->id])->update(['order_ship_draft'=>'Yes'
                    ]);
                }
            }
          
            return redirect()->back()->with('success', 'Order  Goes To Draft');
        }
        return redirect()->back()->with('error', 'Invalid Request');
    }

    // 
    public function orderCancel($id){

        $Id = decrypt($id);

        Order::findOrFail($Id);
        Order::where(['id'=>$Id, 'vendor_id'=>Auth::guard('vendor')->user()->id])->update([
                'status'=>'Canceled'
            ]);
        return redirect()->back()->with('success', 'Order '.'Cancelled');
    }

    // Draft Shippments

    public function draftShippmentsorders(){

        $draftShippmentsorders   = Order::where([
                    'vendor_id'=>Auth::guard('vendor')->user()->id
                ])
                ->orderBy('created_at', 'DESC')
                ->where('order_ship_draft','Yes')
                ->where('request_waybill','No')
                ->where('status','!=','Canceled')
                ->get()->groupby('order_id');        
        return view('orders.partials.draft-shippments', compact('draftShippmentsorders'));
    }
    // 

    public function requestOrderWaybill($order_id){

        $Id = decrypt($order_id);
        Order::where(['order_id'=>$Id, 'vendor_id'=>Auth::guard('vendor')->user()->id])->update([
                'request_waybill'=>'Yes'
            ]);
        return redirect()->back()->with('success', 'Order waybill request successfully post.');

    }

    // 
    public function confirmShippmentsOrders(){

        $confirmShippmentsOrders   = Order::where([
                    'vendor_id'=>Auth::guard('vendor')->user()->id
                    ])
                    ->orderBy('created_at', 'DESC')
                    ->where('order_ship_draft','Yes')
                    ->where('request_waybill','Yes')
                    ->where('confirm_shippment','Yes')
                    ->where('status','!=','Canceled')
                    ->get()->groupby('order_id'); 
        return view('orders.partials.confirm-shippments', compact('confirmShippmentsOrders'));            
    }

    // 
    public function shippedShippmentsOrders(){

        $shippedShippmentsOrders   = Order::where([
                    'vendor_id'=>Auth::guard('vendor')->user()->id
                    ])
                    ->orderBy('created_at', 'DESC')
                    ->where('order_ship_draft','Yes')
                    ->where('request_waybill','Yes')
                    ->where('confirm_shippment','Yes')
                    ->where('shipped','Yes')
                    ->where('status','!=','Canceled')
                    ->get()->groupby('order_id'); 
        return view('orders.partials.shipped-shippments', compact('shippedShippmentsOrders'));            
    }
    // 

    public function printOrders(){

         $data   = Order::where([
                    'vendor_id'=>Auth::guard('vendor')->user()->id
                    ])
                    ->orderBy('created_at', 'DESC')
                    ->where('order_ship_draft','No')
                    ->where('status','!=','Canceled')
                    ->get()->groupby('order_id');
         $pdf = PDF::loadView('export.pdf.orders-export', compact('data'))->setPaper('letter', 'landscape');
         return $pdf->download(date('d-m-Y').'-orders.pdf');             
    }
}
