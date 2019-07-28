<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
	public $timestamps = false;

	protected $fillable = ['name','code','img','brand_id','brandcategorie_id'];

	  public function categorie(){
    	return $this->belongsTo(Categorie::class);
    }

      public function products(){
    	return $this->belongsToMany(Product::class);
    }
}
