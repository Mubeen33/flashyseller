<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = "variations";
    public function get_category(){
    	return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
