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

	private $fixjpg = ["20099012","200CPA404","200CPA405","200CPA407","200CPA408","200CPA409","22000017","22006000","220102045070","220102065060","220102065070","220102067060","220106023080","220106026100","220106032100","220106035100","220106037130","220106042130","220106047140","220106047220","220106048150","28810007","65402093"];

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

	public function setdbext(){
		$filesInFolder = \File::files('items'); 
		    foreach($filesInFolder as $path) {
		          $elem = pathinfo($path);
		          $code = $elem["filename"];
		          $img = $elem["basename"];
			      $this->doUpdateExt($code,$elem["extension"]);
		    } 
	}


	public function setImgJpg(){
		foreach($this->fixjpg as $code) {
			if ( $this->recordExists($code) ){
				$this->doUpdateExt($code,"JPG");
			}
		} 
	}


	private function recordExists($code){
		return Product::where('codice', '=', $code)->exists();
	}

	private function doUpdateExt($code,$ext){
		Log::debug('codice processato '.$this->codetoId($code));
		DB::table('products')
            ->where('codice', $code)
            ->update(['ext' => $ext]);
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
