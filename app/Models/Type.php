<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\commonModelFunctions;


class Type extends Model
{

	use commonModelFunctions;

	public $timestamps = false;
	protected $fillable = ['name','brand_id'];

	 public function productcategories(){
		return $this->belongsToMany(Productcategorie::class,"typeproductcategories","brand_type_id","productcategorie_id");
	}

}
