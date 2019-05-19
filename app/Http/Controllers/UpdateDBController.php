<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\grabHTML;
use App\Product;
use Illuminate\Support\Facades\DB;
use Log;



class UpdateDBController extends Controller
{

	private $granit;

	private $toProcess = [];

	public function __construct(grabHTMl $granit){
		$this->granit = $granit;
	}

	public function codeToId($codice){
		return Product::where("codice",$codice)->pluck("id")->first();
	}

	public function sendReport(){
		$products =  Product::where('qty', '<=', '3')->get(['codice','qty'])->toarray();
		 sendEmail("emails.quantity", $products,"jobamato@gmail.com","aggiornamento detabase quantita prodotti");
	}

	public function updateImgByCode($code,$img) {
		Log::debug('codice processato '.$this->codetoId($code));
		DB::table('products')
            ->where('codice', $code)
            ->update(['img' => $img]);
	}

	public function findNotImgUrl(){
		 $codeimg = DB::select( DB::raw("select * from products where img = '' AND codiceimg IS NOT NULL") );
		 foreach($codeimg as $code) {
		 	$this->toProcess[] = str_replace(" ","",$code->codice);
		 }

		 dd($this->toProcess);
		 
	}


	  public function insertImgInDb()
    {
    	$this->findNotImgUrl();
    	 $filesInFolder = \File::files('items'); 
		    foreach($filesInFolder as $path) {
		          $elem = pathinfo($path);
		          $code = $elem["filename"];
		          $img = $elem["basename"];
			      $this->updateImgByCode($code,$img);
		    } 
    }


    public function qtyUpdate()
    {
    	$this->sendReport();
    	foreach(Product::all()->pluck("codice")->toarray() as $codice) {
    		Log::info("PRODUCT:sto processando il codice ".$this->codeToId($codice));
    		DB::table('products')
            ->where('codice', $codice)
            ->update(['qty' => $this->granit->getQTYById($codice)]);
        }
    }
}
