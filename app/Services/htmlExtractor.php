<?php

namespace App\Services;

use Sunra\PhpSimple\HtmlDomParser;
use File;

class htmlExtractor {

	public function getHtml($filepath) {
		return HtmlDomParser::str_get_html( File::get(storage_path($filepath)) );
	}

	public function getProductName($element){
		return strtolower($element->find("tr",1)->find("td",0)->plaintext);
	}

	public function getProductImage($element){

		$img = str_replace(["/","?id="],"",strrchr( $element->find("img",0)->src , '/' ));

		$this->setProductCode($img);

		return $img;
	}

	public function findElem($filepath) {
		$html = $this->getHtml($filepath);
		return $html->find("div[id=elenco_articoli_box_elenco] div.font_link table");
	}

	public function setProductCode($data){

		$elem = preg_replace('/\\.[^.\\s]{3,4}$/', '', $data);

		$this->ProductCode = strtolower($elem);
	}

	public function getProductCode(){
		return $this->ProductCode;
	}

}