<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
	  public function categorie(){
    	return $this->belongsTo(Categorie::class);
    }

      public function products(){
    	return $this->belongsToMany(Product::class);
    }
}
