<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplement extends Model
{

		public $timestamps = false;


		protected $guarded = [];

      public function citie(){
    	return $this->belongsTo(Citie::class);
    }

      public function prov(){
    	return $this->belongsTo(Prov::class);
    }

      public function buys(){
    	return $this->hasMany(Buy::class);
    }

}
