<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
     public function productcategorie(){
		return $this->hasMany(Productcategorie::class);
	}
}
