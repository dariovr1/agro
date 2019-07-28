<?php

namespace App\Services;

use Log;
use App\Services\productsubcategoriesService;
use App\Services\productSabaService;

use App\Models\Productcategorie;
use App\Models\Typeproductcategorie;

use App\Services\htmlExtractor;

class productcategoriesService extends htmlExtractor {

	private $brandtype;

	public function VerifyRelationship($ProductName) {

		$id_element = Productcategorie::returnID($ProductName);

		$array = Productcategorie::VerifyModelIds($id_element);

		return compareArray([
			"productcategorie_id" => $id_element,
			"brand_types_id" => $this->brandtype
		],$array);

	}


	private function VerifyAndInsertProd($element){

		$ProductName = $this->getProductName($element);

		if( !Productcategorie::recordExists($ProductName) ){

				$create = Productcategorie::create([
						"name" => $ProductName,
						"img" => $this->getProductImage($element),
						"code" => $this->getProductCode()
					]);

				print "<br/>"."la categoria ".$ProductName." è stata inserita";

				if( !$this->VerifyRelationship($ProductName) ){
					Typeproductcategorie::create([
						"brand_type_id" => $this->brandtype,
						"productcategorie_id" => Productcategorie::returnID($ProductName)
					]);
				}else{
					print "la relazione brandType esiste";
				}

				return $create->id;

		}else {
			print "<br/>"."la categoria ".$ProductName." esiste";
			return Productcategorie::returnID($ProductName);
		}


	}


	public function insertProdCat($brand_type_id,$path){

		$filepath = "file/saba/{$path["brand"]}/{$path["filename"]}/file.txt";
		$this->brandtype = $brand_type_id;

		foreach( $this->findElem($filepath) as $element) {

			$idproductcategories = $this->VerifyAndInsertProd($element);

			$path["productcategories"] = str_replace(" ","-",$this->getProductName($element));

			Log::info("il productcategories path è ".$path["productcategories"]);

			$productsubcategoriesService = new productsubcategoriesService($idproductcategories,$path); 

			$productsubcategoriesres = $productsubcategoriesService->insertSubcategories();

			$path["productsubcategories"] = str_replace(" ","-",$productsubcategoriesres["productsubcategories"]);

	    	Log::info("il productsubcategories path è ".$path["productsubcategories"]);


			$productSabaService = new productSabaService($productsubcategoriesres["id"],$path);

			$productSabaService->init();

		}

	}

}