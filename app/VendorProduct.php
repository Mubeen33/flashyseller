<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    public function get_product(){
    	return $this->belongsTo('App\Product', 'prod_id', 'id');
    }

    public function get_variation(){
    	return $this->belongsTo('App\Variation', 'variation_id', 'id');
    }
}
