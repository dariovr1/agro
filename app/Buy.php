<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{

    protected $fillable = ['user_id'];

        public $timestamps = false;


   	 public function user()
    {
           return $this->belongsTo(User::class);
    }

    public function carts(){
    	return $this->belongsToMany(Cart::class);
    }

    public function supplement(){
    	return $this->belongsTo(Supplement::class);
    }

     public function pay(){
    	return $this->belongsTo(Pay::class);
    }


}
