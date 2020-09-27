<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function get_customer(){
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
    public function get_vendor_product(){
        return $this->belongsTo('App\VendorProduct', 'vendor_product_id', 'id');
    }

}
