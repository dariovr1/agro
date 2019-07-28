<?php

namespace App\Services;

use App\Models\Product;

use App\Services\htmlExtractor;

use Log;



class productSabaService extends htmlExtractor {


	private $FILEPATH = "file/saba/";
	private $idsubproduct;
	private $number = 1;
	public $ProductCode;

	public function __construct($id,$path) {
		$this->FILEPATH = $this->FILEPATH."{$path['brand']}/{$path['filename']}/{$path["productcategories"]}/{$path["productsubcategories"]}/{$this->number}.txt";
		$this->idsubproduct = $id;
	}

	public function findElem($filepath) {
		$html = $this->getHtml($filepath);
		return $html->find("td table[border=0]");
	}


	public function getPrice($element){

		$output = preg_replace( '/[^,0-9]/', '', $element->parent()->parent()->find("table[id=tabella_prezzi] .font_verde",0)->plaintext );

		return str_replace(",",".",$output);
		
	}

	public function getAv($element) {
		$output = str_replace("&nbsp;","",$element->find(".immaginemenu",0)->parent()->plaintext);
		$output = str_replace(" ", "", $output);
		return $output == "disponibile" ? 1 : 0;
	}

	public function getProductName($element) {
		$output = $element->find("tr",1)->find("span",0)->plaintext;
		return rtrim($output);
	}

	private function goLog($element){
		Log::info("element è ".$element);
	  	Log::info("productName è ".$this->getProductName($element));
	  	Log::info("getProductImage è ".$this->getProductImage($element));
	  	Log::info("getProductCode è ".$this->getProductCode($element));
	  	Log::info("price è ".$this->getPrice($element));
	  	Log::info("av è ".$this->getAv($element));
	}

	public function init() {

	  	foreach( $this->findElem($this->FILEPATH) as $element) {

	  		if(array_key_exists("id",$element->attr)){
	  			continue;
	  		}


	  		$this->goLog($element);


	  		if( !Product::recordExists($this->getProductName($element)) ) {

		  			Product::create([
						"name" => $this->getProductName($element),
						"img" => $this->getProductImage($element),
						"code" => $this->getProductCode($element),
						"price" => $this->getPrice($element),
						"av" => $this->getAv($element),
						"productsubcategories_id" => $this->idsubproduct
					]);


					print "<br/>"."product ".$this->getProductName($element)." inserito";

				}else {
					print "<br/>"."product ".$this->getProductName($element)." è presente nel db";
				}

	  		}

	  }

}
