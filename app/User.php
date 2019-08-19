<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome','cognome','email','password','sesso','phone','compleanno'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function ($user){
        
            sendEmail("emails.welcome", [
                    "nome" => $user->nome,
                    "cognome" => $user->cognome,
                    "compleanno" => $user->compleanno,
                    "email" => $user->email,
                    "telefono" => $user->phone
                ],$user->email,"grazie per esserti registrato");

            sendEmail("emails.emailverify", [
                    "id" => $user->id,
                    "nome" => $user->nome,
                    "cognome" => $user->cognome,
                    "email" => $user->email,
                ],$user->email,"verifica il tuo account");


        });
    }

     public function carts(){
        return $this->hasMany(\App\Models\Cart::class);
    }

    public function setCompleannoAttribute($value){
        $date = str_replace('/', '-', $value);
        return $this->attributes['compleanno'] = date('Y-m-d', strtotime($date));
    }


     public function supplements(){
        return $this->hasMany(Supplement::class);
    }

    public function buys()
    {
           return $this->hasMany(Buy::class);
    }

}
