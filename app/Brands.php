<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';

    public function brands($id = null)
    {    if(!empty($id)){
            return Brands::where(['id'=> $id,'active'=> 'Y'])->get();  
	     }else{
			 return Brands::where('active','Y')->get();  
		 }
        
    }

}
