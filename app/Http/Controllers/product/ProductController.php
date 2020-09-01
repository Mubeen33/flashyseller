<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductMedia;

class ProductController extends Controller
{
    
    public function index(){

    	return view('product.addproduct');
    }
}
