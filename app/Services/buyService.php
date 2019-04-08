<?php 

namespace App\Services;
use App\Buy;
use App\Supplement;
use App\Buy_supplement;
use App\Buy_product;
use session;
use Cart;

class buyService {

	private $buyID;
	private $address;

	public function buyProducts($data){
	 return $this->saveBuyDb($data)->insertSupplement()->savePivotBuyProduct();

	}

    private function saveBuyDb($data){
		 $this->buyID = Buy::create($data)->id;
		 return $this;
	}

	private function savePivotBuyProduct(){
		foreach(Cart::content() as $item){
			Buy_product::create([
				"buy_id" => $this->buyID,
				"product_id" => $item->id
			]);
		}

		return $this->buyID;
	}

	private function insertSupplement(){

		if( count(session("address")) > 1 ){

			$this->address = Supplement::create([
				"nome" => session("address")["nome"],
				"cognome" => session("address")["cognome"],
				"via" => session("address")["via"],
				"presso" => session("address")["presso"],
				"cap" => session("address")["cap"],
				"prov_id" => session("address")["comune"],
				"citie_id" => session("address")["provincia"],
				"user_id" => auth()->id(),
				"telefono" => session("address")["telefono"]
			])->id;
			
		}else {
			$this->address = session("address")["id"];
		}

		Buy_supplement::create([
			"buy_id" => $this->buyID,
			"supplement_id" => $this->address
		]);

		return $this;

	}

}