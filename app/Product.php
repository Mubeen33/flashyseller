<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function get_category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}

	public function get_images()
	{
		return $this->hasMany('App\ProductMedia', 'image_id', 'image_id');
	}
}
