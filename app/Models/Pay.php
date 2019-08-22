<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
     public function buy(){
    	return $this->hasMany(Buy::class);
    }
}
