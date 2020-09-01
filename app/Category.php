<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    // All Parents of any Subcategory

	public function getParentsNames() {
		
	    if($this->parent) {
	        return $this->parent->getParentsNames(). " -> " . $this->name;
	    } else {
	        return $this->name;
	    }
	}
}
