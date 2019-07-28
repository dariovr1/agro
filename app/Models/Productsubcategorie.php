<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\commonModelFunctions;

use Log;

class Productsubcategorie extends Model
{
    use commonModelFunctions;

	protected $guarded = [];
	public $timestamps = false;

	public function products()
	{
	 	return $this->hasMany(Product::class); 
	}

}
