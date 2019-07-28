<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Brand_type extends Model
{
	protected $table = 'brand_type';
	public $timestamps = false;
	protected $fillable = ['brand_id','type_id'];

	public function productcategorie(){
		return $this->belongsToMany(Productcategorie::class,"typeproductcategories","brand_type_id","productcategorie_id"); 
	}

	public static function returnID($first,$second){
		return self::where('brand_id', '=', $first)
			     ->where('type_id', '=', $second)
			     ->get()->pluck("id")->first();
	}

	public static function checkKeysExists($first,$second){
		return DB::table('brand_type')->whereBrandId($first)->whereTypeId($second)->count() > 0;
	}
}
