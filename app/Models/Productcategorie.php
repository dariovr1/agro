<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productcategorie extends Model
{
     public function productsub(){
		return $this->hasMany(Productsubcategorie::class);
	}
}
