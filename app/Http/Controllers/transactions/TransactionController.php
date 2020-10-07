<?php

namespace App\Http\Controllers\transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Transaction;

class TransactionController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:vendor');
    }
    public function index(){

    	$transactions = Transaction::where('vendor_id',Auth::guard('vendor')->user()->id)->get();
    	
    	return view('transactions.transactions',compact('transactions'));
    }
}
