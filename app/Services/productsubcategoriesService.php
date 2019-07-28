<?php

namespace App\Services;

use App\Models\Productsubcategorie;

use App\Services\htmlExtractor;

class productsubcategoriesService extends htmlExtractor {


	private $FILEPATH = "file/saba/";
	private $idproductcategories;
	private $path_filename;

	public function __construct($idproductcategories,$path) {

		$this->FILEPATH = $this->FILEPATH."{$path['brand']}/{$path['filename']}/{$path["productcategories"]}/file.txt";
		$this->idproductcategories = $idproductcategories;
		$this->path_filename = $path["productcategories"];
	}

	private function checkScore($filepath) {
		return strpos($filepath, '-') !== false;
	}

	public function insertSubcategories() {
	
	  	foreach( $this->findElem($this->FILEPATH) as $element) {

	  		if( !Productsubcategorie::recordExists( $this->getProductName($element) ) ){
		  			
		  			 $create = Productsubcategorie::create([
						"name" => $this->getProductName($element),
						"img" => $this->getProductImage($element),
						"code" => $this->getProductCode(),
						"productcategories_id" => $this->idproductcategories
					]);

					print "<br/>"."la subcategoria ".$this->getProductName($element)." è stata inserita";

					return [
						"id" => $create->id,
						"productsubcategories" => $this->getProductName($element)
					];

				}else {
					print "<br/>"."la subcategoria ".$this->getProductName($element)." è presente nel db";

					return [
						"id" => Productsubcategorie::returnID($this->getProductName($element)),
						"productsubcategories" => $this->getProductName($element)
					];

				}
	  		}

	  }

}
