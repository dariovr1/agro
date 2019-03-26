<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Cart;
use auth;
use App\Services\cartService;


class CartController extends Controller
{

  private $cart;


  public function __construct(cartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {

        return view("cart.index",[
          "carts" => Cart::content(),
          "count" => Cart::count(),
          "weight" => $this->cart->cartTotalWeight(),
          "subtotale" => Cart::subtotal()
        ]);

    }

    public function checkout(){

      $this->verifyUserLogin();
      $this->cart->newCartbyId(auth()->id());

      return redirect("checkout/address");

    }

    public function insert($id)
    {

      $this->verifyUserLogin();

         if (!Cart::where('product_id', '=', $id)->exists()) {
            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->id()
            ]);
        }

        return redirect('cart/');
    }


    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        return redirect()->back()->with("success","prodotto aggiornato con successo");
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with("success","prodotto eliminato");
    }

    public function verifyUserLogin(){
       if(!Auth::user()){
             return redirect('/login')->with("warning","è necessario loggarsi o registrarsi per inserire prodotti nel carrello");
        }
    }

}
