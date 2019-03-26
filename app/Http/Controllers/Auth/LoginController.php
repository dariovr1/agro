<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\cartService;
use Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $cart;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(cartService $cart)
    {
        $this->middleware('guest')->except('logout');
        $this->cart = $cart;
    }

    protected function authenticated()
    {
        //dato auth id ho bisogno di verificare se l'utente ha o non ha elementi in carrello ed inserirli in collection Cart
        $this->cart->retriaveCartElem(auth()->id());
    }


}
