<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy_supplement extends Model
{
		protected $fillable = ['buy_id',"supplement_id"];
        protected $table = 'buy_supplement';
        public $timestamps = false;
}
