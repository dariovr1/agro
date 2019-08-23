<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Cart;
use Auth;
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
          "subtotale" => Cart::subtotal(),
          "count" => count(Cart::content())
        ]);

    }

    public function checkout(){

      $this->cart->newCartbyId(Auth::id());

      return redirect("checkout/address");

    }

    public function insert($id)
    {
        $this->cart->insertProductInCartById($id);
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
