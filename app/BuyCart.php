<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyCart extends Model
{
   	    protected $table = 'buy_cart';

   	    protected $fillable = ['buy_id'];

   	    public $timestamps = false;
}
