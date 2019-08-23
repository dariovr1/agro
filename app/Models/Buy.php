<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use session;
use App\User;
use Cart;


class Buy extends Model
{

    protected $fillable = ['user_id',"pay_id","shipmethod_id","supplement_id"];

        public $timestamps = false;

/*

     protected static function boot(){
        parent::boot();

        static::created(function(){
             sendEmail("emails.order",Cart::content()->toArray(),User::find(auth()->id())->email,"riepilogo acquisti agroambiente s.r.l");

        });
    }

    */

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
