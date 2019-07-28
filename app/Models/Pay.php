<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
     public function buy(){
    	return $this->hasMany(Buy::class);
    }
}
