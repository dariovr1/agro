<?php 

namespace App\Services;
use App\Models\Buy;
use App\Models\Supplement;
use App\Models\BuyCart;
use Session;
use Auth;
use Log;
use DB;

class buyService {

	public function buyProducts(){
	  $id_supplement = $this->insertSupplement();
	  $id_order = $this->saveBuyDb($id_supplement);
	  Session::put('idOrder', $id_order);
	  $this->savePivotBuyProduct($id_order);
	}

	public function orderCompleted($id_order){
		DB::table('buys')
            ->where('id', $id_order)
            ->update(['done' => 1]);
	}


	public function retriaveUserbyOrder($id_order){
		return Buy::find($id_order)->user()->get()->toArray();
	}

    private function saveBuyDb($id_supplement){

		$id =  Buy::create([
			"user_id" => Auth::id(),
			"pay_id" => session("payment")["payment"],
			"shipmethod_id" => session("shipping")["shipping"],
			"supplement_id" => $id_supplement
		 ])->id;

		return $id;
	}

	private function savePivotBuyProduct($id_order){

		foreach(session("buy_cart") as $pivotItem) {

			BuyCart::create([
				"buy_id" => $id_order,
				"cart_id" => $pivotItem
			]);
		}
	}


	private function insertSupplement(){

		if( count(session("address")) > 1 ){

			$address = Supplement::create([
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
			
		}

		return $address;

	}

}