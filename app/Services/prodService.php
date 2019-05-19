<?php 

namespace App\Services;

use Mail;
use App\User;
use App\Product;
use Cart;
use Log;

class prodService {

	public function getProdById($id){
		return Product::find($id)->toarray();
	}

	public function getCodeById($id){
		return Product::find($id)->pluck('codice')->toarray();
	}

	public function checkProductExistsInCart($id){
		Cart::search(function($cartItem,$rowId) use ($id) {
			if($cartItem->id === $id) {
				return ["rowId" => $rowId , "qty" => $cartItem->qty ];
			}
			return false;
		});
	}


}