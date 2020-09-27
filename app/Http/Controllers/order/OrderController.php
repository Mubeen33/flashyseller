<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }


    public function orders(){
    	$orders = Order::all();
    }
}
