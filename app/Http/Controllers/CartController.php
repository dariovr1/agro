<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Cart;

use auth;

class CartController extends Controller
{
 
    public function index()
    {

        if (auth()->user()) {
              $carts = Cart::with('product')->where('user_id',auth()->id())->get();
        }
        return view("cart.index",compact('carts'));

    }


    public function insert($id)
    {

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
