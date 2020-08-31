<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function get_category()
	{
		return $this->belongsTo('App\Category', 'cat_id');
	}
}
