<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy_product extends Model
{
		protected $fillable = ['buy_id',"product_id"];
        protected $table = 'buy_product';
        public $timestamps = false;
}
