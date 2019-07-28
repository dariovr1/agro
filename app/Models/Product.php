<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\commonModelFunctions;


class Product extends Model
{

    use commonModelFunctions;

	public $timestamps = false;

     protected $guarded = [];

     public function carts(){
    	return $this->hasMany(Cart::class);
    }


       public function buys(){
        return $this->belongsToMany(Buy::class);
    }


}
