<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function subcategories(){
    	return $this->hasMany(Subcategorie::class);
    }

       public function products(){
    	return $this->hasMany(Product::class);
    }

}
