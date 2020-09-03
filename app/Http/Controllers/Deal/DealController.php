<?php

namespace App\Http\Controllers\Deal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Deal;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Validator;

class DealController extends Controller
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


    public function index()
    {
        $data = Deal::where('vendor_id', Auth::guard('vendor')->user()->id)
            ->orderBy('status', 'ASC')
            ->with('get_product')
            ->paginate(5);
        return view('Deals.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Deals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'product'=>'required|string',
            'product_id'=>'required|numeric',
            'start_time'=>'required|date',
            'end_time'=>'required|date',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric'
        ]);

        if ($validation->fails()) {
            foreach ($validation->messages()->get('*') as $key => $value) {
                $value = json_encode($value);
                $text = str_replace('["', "", $value);
                $text = str_replace('"]', "", $text);
                return response()->json([
                    'field'=>$key,
                    'targetHighlightIs'=>"",
                    'msg'=>$text,
                    'need_scroll'=>"yes"
                ], 422);
            }
        }

        $current = Carbon::now();
        $today = $current->format('Y-m-d');
        if ($today > (date('Y-m-d', strtotime($request->start_time)))) {
            return response()->json([
                    'field'=>"start_time",
                    'targetHighlightIs'=>"",
                    'msg'=>"Start Time can not be backdate",
                    'need_scroll'=>"no"
                ], 422);
        }

        if (date('Y-m-d', strtotime($request->start_time)) >= date('Y-m-d', strtotime($request->end_time))) {
            return response()->json([
                    'field'=>"end_time",
                    'targetHighlightIs'=>"",
                    'msg'=>"End Time can not be equal or less of Start Time",
                    'need_scroll'=>"no"
                ], 422);
        }

        //insert now
        $inserted = Deal::insert([
            'vendor_id'=>Auth::guard('vendor')->user()->id,
            'product_id'=>$request->product_id,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now()
        ]);

        if ($inserted == true) {
            return response()->json([
                'success'=>true,
                'msg'=>"Deal Created Successfully"
            ], 200);
        }else{
            return response()->json("Something went wrong, please try again.", 500);
        }
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
        $id = \Crypt::decrypt($id);
        $data = Deal::findOrFail($id);
        return view('Deals.edit', compact('data'));
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
        $validation = Validator::make($request->all(), [
            'product'=>'required|string',
            'product_id'=>'required|numeric',
            'start_time'=>'required|date',
            'end_time'=>'required|date',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric'
        ]);


        if ($validation->fails()) {
            foreach ($validation->messages()->get('*') as $key => $value) {
                $value = json_encode($value);
                $text = str_replace('["', "", $value);
                $text = str_replace('"]', "", $text);
                return response()->json([
                    'field'=>$key,
                    'targetHighlightIs'=>"",
                    'msg'=>$text,
                    'need_scroll'=>"yes"
                ], 422);
            }
        }

        $oldData = Deal::where([
            'id'=>$id,
            'vendor_id'=>Auth::guard('vendor')->user()->id,
            'status'=>0
        ])->first();

        if (!$oldData) {
            return response()->json('Deal Not Found', 404);
        }

        $current = Carbon::now();
        $today = $current->format('Y-m-d');
        if ($request->start_time != $oldData->start_time) {
            if ($today > (date('Y-m-d', strtotime($request->start_time)))) {
                return response()->json([
                    'field'=>"start_time",
                    'targetHighlightIs'=>"",
                    'msg'=>"Start Time can not be backdate",
                    'need_scroll'=>"no"
                ], 422);
            }
        }
        

        if ($request->start_time != $oldData->end_time) {
            if (date('Y-m-d', strtotime($request->start_time)) >= date('Y-m-d', strtotime($request->end_time))) {
                return response()->json([
                    'field'=>"end_time",
                    'targetHighlightIs'=>"",
                    'msg'=>"End Time can not be equal or less of Start Time",
                    'need_scroll'=>"no"
                ], 422);
            }
        }



        


        //insert now
        $update = $oldData->update([
            'product_id'=>$request->product_id,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'updated_at'=>Carbon::now()
        ]);

        if ($update == true) {
            return response()->json([
                'success'=>true,
                'msg'=>"Deal Updated Successfully"
            ], 200);
        }else{
            return response()->json("Something went wrong, please try again.", 500);
        }
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


    //custom
    public function get_products(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;

            $getProducts = Product::where("title", "LIKE", "%$searchKey%")
                        ->orWhere("description", "LIKE", "%$searchKey%")
                        ->with("get_category")
                        ->orderBy('title', 'ASC')
                        ->paginate(10);
            if ($getProducts->isEmpty()) {
                return response()->json('No Data Found', 404);
            }

            return view('Deals.partials.auto-complete', compact('getProducts'))->render();
        }
        return abort(404);
    }


    //delete deal
    public function delete_deal($id){
        $id = \Crypt::decrypt($id);
        $data = Deal::where([
            'id'=>$id,
        ])->first();
        if (!$data) {
            return redirect()->back()->with('error','Deal Not Found');
        }

        if ($data->status != 0) {
            return redirect()->back()->with('error',"SORRY -  You can't this deal.");
        }
        $data->delete();
        return redirect()->back()->with('success',"SUCCESS -  Deal Deleted");
    }
}
