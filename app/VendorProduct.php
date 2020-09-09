<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
	protected $fillable = [
		'ven_id',
		'prod_id',
		'variation_id',
		'quantity',
		'mk_price',
		'price',
		'dispatched_days',
		'active',
		'comments'
	];

    public function get_product(){
    	return $this->belongsTo('App\Product', 'prod_id', 'id');
    }

    public function get_variation(){
    	return $this->belongsTo('App\Variation', 'variation_id', 'id');
    }
}
