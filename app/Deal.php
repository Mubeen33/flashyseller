<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
    	'product_id',
    	'start_date',
    	'end_date',
    	'price',
    	'quantity',
    	'status'
    ];

    public function get_product(){
    	return $this->belongsTo("App\Product", 'product_id', 'id');
    }
}
