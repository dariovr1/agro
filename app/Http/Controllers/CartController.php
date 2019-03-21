<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Cart as CartModel;
use Cart;
use auth;

class CartController extends Controller
{

  private $items = '';
  public $userId = '';

   public function __construct() {

      $this->middleware(function ($request, $next) {

        $this->items = (Auth::check() ) ? $this->checkItemsById(Auth::user()->id) : "";

        return $next($request);
      });

   }

    public function index()
    {

        return view("cart.index",compact('carts'));

    }


  private function setItemsInCarts($elem){
    dd($elem);
  }


  private function checkItemsById($user){
    $result = CartModel::with('product')->where('user_id',$user)->get();
      if ($result->count()) {
        return $this->setItemsInCarts($result);
      }
      return "";
  }


    public function insert($id)
    {

      dd("items vale".$this->items);

        if(!Auth::user()){
             return redirect('/login')->with("warning","è necessario loggarsi o registrarsi per inserire prodotti nel carrello");
        }

         if (!Cart::where('product_id', '=', $id)->exists()) {
            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->id()
            ]);
        }

        return redirect('cart/');
    }


    public function update(Request $request, $id)
    {
        Cart::where('id', $id)->update([
            "quantita" => Request()->qty
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);

        return redirect()->back();
    }
}
