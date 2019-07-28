<?php 

namespace App\Services;

use Mail;
use App\User;
use App\Models\Product;
use Cart;
use Log;
use App\Services\quantityService;

class prodService {

	private $status_badge = [
		"success" => "prodotto disponibile",
		"warning" => "prodotto in esaurimento",
		"danger" => "prodotto esaurito"
		];


	public function getProdById($id){
		return Product::find($id)->toarray();
	}

	public function getCodeById($id){
		return Product::find($id)->pluck('codice')->toarray();
	}

	public function getStatusBadge($id){
		/*
		$res = $this->qtyService->getQtyUpdate( $this->idToCode($id) );
			if( $res > 3 ) {
				return json_encode(array('success' => 'prodotto disponibile'));
			}

			if( $res < 3 && $res != 0) {
				return json_encode(array("warning" => "prodotto in esaurimento"));
			}

			if($res == 0) {
				return json_encode(array("danger" => "prodotto esaurito"));
			}
		*/
	}


	private function idToCode($id){
		return Product::where("id",$id)->pluck("codice")->first();
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