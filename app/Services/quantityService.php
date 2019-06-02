<?php
namespace App\Services;

use Mail;
use App\Product;
use Log;
use App\Services\grabHTMl;
use DB;


class quantityService {

	private $granit;
	private $minQuantity = 3;

	public function __construct(grabHTMl $granit){
		$this->granit = $granit;
	}

	//facade update products cronjob

	public function qtyUpdate() {
		foreach(Product::all()->pluck("codice")->toarray() as $codice) {
    		$this->qtyUpdateByCode($codice);
        }

        $this->sendReport();
	}

	private function codeToId($codice){
		return Product::where("codice",$codice)->pluck("id")->first();
	}

	private function sendReport(){

		$products =  Product::where('qty', '<=', $this->minQuantity)->get(['codice','qty'])->toarray();

		 sendEmail("emails.quantity", $products,"jobamato@gmail.com","aggiornamento detabase quantita prodotti del ".date('d-m-Y H:i:s'));
	}


	private function qtyUpdateByCode($codice)
    {
    	foreach(Product::all()->pluck("codice")->toarray() as $codice) {
    		Log::info("PRODUCT:sto processando il codice ".$this->codeToId($codice));
    		$this->qtyByGranit($codice);
        }
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