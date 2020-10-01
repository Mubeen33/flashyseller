<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    protected $table = 'product_variations';

    public function product_variation(){
    	return $this->belongsTo('App\VendorProduct', 'id', 'variation_id')->where('active', 1);
    }
}
