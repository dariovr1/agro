<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use session;
use Cart;
use App\User;
use Cart as CartModel;


class Buy extends Model
{

    protected $fillable = ['user_id',"pay_id","shipmethod_id"];

        public $timestamps = false;

     protected static function boot(){
        parent::boot();

        static::created(function(){
             sendEmail("emails.order",Cart::content()->toArray(),User::find(auth()->id())->email,"riepilogo acquisti agroambiente s.r.l");

        });
    }

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

       public function products(){
        return $this->belongsToMany(Product::class);
    }


}
