<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	public $timestamps = false;

     protected $guarded = [];


    public function getCodiceAttribute($value){
        return  preg_replace('/\s+/', '', $value);
    }

     public function getPrezzoAttribute($value){
        $prezzo = surplusIvaPrezzo($value);

        return number_format($prezzo,2,",",".");
    }

    public function getDescrizioneAttribute($value) {
       return  json_decode(str_replace(" tecnici","",$value));
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


       public function buys(){
        return $this->belongsToMany(Buy::class);
    }


}
