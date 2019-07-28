<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeproductcategorie extends Model
{
	protected $table = 'typeproductcategories';
	protected $guarded = [];
	public $timestamps = false;

	public function brand_type(){

    return $this->hasMany(Brand_type::class);

	}

}
