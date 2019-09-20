<?php 

namespace App\Services;

use Mail;
use App\User;
use App\Models\Cart as CartModel;
use Cart;
use Log;
use Session;
use App\Services\prodService;

class cartService {

	private $prod;
	private $fixprice = 15;


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
		$total = $this->toDecimal(Cart::subtotal()) +  $this->fixprice;
		
		return number_format($total, 2, ',', '.');
	}


	public function newCartbyId($id){
		$this->destroyAllDbRef($id);
		$array_pivot_carts_products = $this->insertAllCartDb($id);
		Session::put("buy_cart",$array_pivot_carts_products);
	}


	private function toDecimal($number){
		$str = str_replace(str_split(','),'',$number);
		return (double) $str;
	}


	public function cartTotalWeight(){

		$total =  $this->fixprice;
		
		return number_format($total, 2, ',', '.');
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
				'name' => $prod["name"],
				'qty' => "1",
				'price' => str_replace(",",".",$prod["price"]),
				'options' => ['codice' => $prod["code"] , 'imgurl' => $prod["imgurl"] , 'av' => $prod["av"] ]
			]);
	}

	public function insertProdCartSession($id){
		$carts = CartModel::with('product')->where('user_id',$id)->get();

		foreach($carts as $cart) {

			Cart::add([
				'id' => $cart->product->id,
				'name' => $cart->product->name,
				'qty' => $cart->quantita,
				'price' => $cart->product->price,
				'options' => ['codice' => $cart->product->code , 'imgurl' => $cart->product->imgurl]
			]);
		}
	} 
	


	public function retriaveCartElem($id){
		if($this->countCartElemfromDb($id) > 0){
			$this->insertProdCartSession($id);
		}
	}

	private function insertAllCartDb($id){

		$arr = [];

		foreach( Cart::content() as $cartItem ){
			$id = CartModel::create([
				"product_id" => $cartItem->id,
				"user_id" => $id,
				"time" => now(),
				"quantita" => $cartItem->qty
			])->id;

			$arr[$cartItem->id] = $id;
		}

		return $arr;

	}

	private function destroyAllDbRef($id){
		CartModel::where("user_id",$id)->delete();
	}

}