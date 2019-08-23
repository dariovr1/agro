<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyCart extends Model
{

	 public $timestamps = false;

	protected $table = 'buy_cart';
    protected $fillable = ['buy_id','cart_id'];
}
