<?php 

namespace App\Services;

use Mail;
use App\User;
use App\Cart as CartModel;
use Cart;
use Log;
use App\Services\prodService;

class cartService {

	private $prod;


    public function  __construct(){
    	$this->prod = new prodService();
    }


	public function countCartElemfromDb($id){
		return User::find($id)->carts()->count();
	}

	public function insertProductInCartById($id) {

		$this->insertProdIntoCart($this->prod->getProdById($id));
	}

	private function updateQtyElem($data){
		dd($data);
	}

	public function getTotalCost(){
		return Cart::subtotal() + $this->cartTotalWeight(); 
	}


	public function newCartbyId($id){
		$this->destroyAllDbRef($id);
		$this->insertAllCartDb($id);
	}

	public function cartTotalWeight(){
		$weight = 0;

		foreach(Cart::content() as $ce){
			$weight += $ce->options->peso * $ce->qty; 
		}

		return $this->calculateTransfer($weight);
	}


	public function calculateTransfer($peso){

		if ($peso <= 3) {
			return "6.38";
		}else if ( $peso > 3 && $peso <= 5 ){
			return "7.78";
		}else if ( $peso > 5 && $peso <= 10 ){
			return "8.80";
		}else if ( $peso > 10 && $peso <= 20 ){
			return "13.05";
		}else if ( $peso > 20 && $peso <= 30 ){
			return "16.37";
		}else if ( $peso > 30 && $peso <= 40 ){
			return "27.37";
		}else if ( $peso > 40 && $peso <= 50 ){
			return "38.37";
		}else if ( $peso > 50 && $peso <= 60 ){
			return "49.37";
		}else if ( $peso > 60 && $peso <= 70 ){
			return "60.37";
		}

	}


	public function insertProdIntoCart($prod) {
			Cart::add([
				'id' => $prod["id"],
				'name' => $prod["nome"],
				'qty' => "1",
				'price' => str_replace(",",".",$prod["prezzo"]),
				'options' => ['peso' => floatval($prod["peso"]), 'codice' => $prod["codice"] ]
			]);
	}

	public function insertProdCartSession($id){
		$carts = CartModel::with('product')->where('user_id',$id)->get();
		foreach($carts as $cart) {
			Cart::add([
				'id' => $cart->product->id,
				'name' => $cart->product->nome,
				'qty' => $cart->quantita,
				'price' => str_replace(",",".",$cart->product->prezzo),
				'options' => ['peso' => $cart->product->peso, 'codice' => $cart->product->codice]
			]);
		}
	} 
	


	public function retriaveCartElem($id){
		if($this->countCartElemfromDb($id) > 0){
			$this->insertProdCartSession($id);
		}
	}

	private function insertAllCartDb($id){
		foreach( Cart::content() as $cartItem ){
			CartModel::insert([
				"product_id" => $cartItem->id,
				"user_id" => $id,
				"time" => now(),
				"quantita" => $cartItem->qty
			]);
		}
	}

	private function destroyAllDbRef($id){
		CartModel::where("user_id",$id)->delete();
	}

}