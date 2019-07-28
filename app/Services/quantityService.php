<?php
namespace App\Services;

use Mail;
use App\Models\Product;
use Log;
use DB;


class quantityService {

	private $granit;
	private $minQuantity = 3;

	//facade update products cronjob

	public function qtyUpdateInit() {

		foreach(Product::all()->pluck("codice")->toarray() as $codice) {
    		$this->qtyUpdateByCode($codice);
        }

        $this->sendReport();

	}

	public function updateQuantityLimit() {

		$array = Product::where('qty', '<=', $this->minQuantity)->get(['codice','qty'])->toarray();

		foreach($array as $arr) {
    		$this->qtyByGranit($arr["codice"]);
        }

        $this->sendReport();

	}


	public function checkAPIqtyUpdate($codice,$qty) {
		 return $codice != "" && $this->recordExists($codice) && $qty != "" && $qty && is_numeric($qty) && $qty > 0;
	}

	private function recordExists($code){
		return Product::where('codice', '=', $code)->exists();
	}

	public function updateQuantityDatabaseByCode($codice,$qty){

	  $actualQuantity = $this->getQtyUpdate($codice);

		  if( $actualQuantity > 0 ){

		  	  $this->setQtyUpdate($codice,$actualQuantity - $qty);

		  	sendEmail("emails.quantitycode", [
						"codice" => $codice,
						"aqty" => $actualQuantity,
						"qty" => $this->getQtyUpdate($codice),
						"status" => 0
					],"jobamato@gmail.com","aggiornamento detabase quantita codice ".$codice);

		  }else {
		  	sendEmail("emails.quantitycode", [
						"codice" => $codice,
						"status" => 1
					],"jobamato@gmail.com","aggiornamento codice ".$codice." non andato a buon fine");
		  }

	}

	 private function setQtyUpdate($codice,$qty)
    {
       	   DB::table('products')
            ->where('codice', $codice)
            ->update( ['qty' => $qty] );
    }

     public function getQtyUpdate($codice)
    {
       return Product::where("codice",$codice)->pluck("qty")->first();
    }

	private function codeToId($codice){
		return Product::where("codice",$codice)->pluck("id")->first();
	}

	private function sendReport(){

		$products =  Product::where('qty', '<=', $this->minQuantity)->get(['codice','qty'])->toarray();

		 sendEmail("emails.quantity", $products,"jobamato@gmail.com","aggiornamento detabase quantita prodotti del ".date('d-m-Y H:i:s'));
	}


	private function qtyUpdateGranit($codice,$qty){
		Log::info("PRODUCT:sto processando il codice ".$this->codeToId($codice));
		DB::table('products')
	    ->where('codice', $codice)
	    ->update(['qty' => $this->granit->getQTYById($codice)]);
    }


    private function qtyByGranit($codice){
    	$qty = $this->granit->getQTYById($codice);

    	Log::info("SERVICE QUANTITY: la quantità per ".$codice." è ".$qty);

    	DB::table('products')
            ->where('codice', $codice)
            ->update(['qty' => $qty]);

    	Log::info("SERVICE QUANTITY: il db ha aggiornato ".$codice." correttamente");

	}

}