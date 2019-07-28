<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\commonModelFunctions;

use Log;

class Productcategorie extends Model
{

	use commonModelFunctions;

	protected $guarded = [];
	public $timestamps = false;

	public function brand_types(){
		return $this->belongsToMany(brand_type::class,"typeproductcategories","productcategorie_id","brand_type_id");
	}

	private static function checkRecord($idproduct){
		return self::find($idproduct)->brand_types()->count();
	}

	public static function VerifyModelIds($idproduct){

		if(self::checkRecord($idproduct) == 0) {
			return [];
		}

		$query = self::find($idproduct)->brand_types()->first()->toArray();

		return [
			"productcategorie_id" => $query["pivot"]["productcategorie_id"],
			"brand_types_id" => $query["pivot"]["brand_type_id"]
		];
	}

	public function subcategories(){

		return $this->hasMany(Productsubcategorie::class);

	}

    public function typeproductcategories(){
		return $this->hasMany(Typeproductcategorie::class);
	}
}
