<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	public $timestamps = false;


    public function getCodiceAttribute($value){
        return  preg_replace('/\s+/', '', $value);
    }
	
     public function subcategories(){
    	return $this->belongsToMany(Subcategorie::class);
    }

     public function categorie(){
    	return $this->belongsTo(Categorie::class);
    }

     public function carts(){
    	return $this->hasMany(Cart::class);
    }

}
