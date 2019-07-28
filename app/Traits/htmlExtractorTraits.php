<?php

namespace App\Traits;

use Sunra\PhpSimple\HtmlDomParser;
use File;

trait htmlExtractorTraits 
{

	public static function getHtml($filepath) {
		return HtmlDomParser::str_get_html( File::get(storage_path($filepath)) );
	}

	public static function getProductName($element){
		return strtolower($element->find("tr",1)->find("td",0)->plaintext);
	}

	public static function getProductImage($element){

		$img = str_replace(["/","?id="],"",strrchr( $element->find("img",0)->src , '/' ));

		$this->setProductCode($img);

		return $img;
	}

	public static function findElem($filepath) {
		$html = $this->getHtml($filepath);
		return $html->find("div[id=elenco_articoli_box_elenco] div.font_link table");
	}

	public static function setProductCode($data){

		$elem = preg_replace('/\\.[^.\\s]{3,4}$/', '', $data);

		$this->ProductCode = strtolower($elem);
	}

	public static function getProductCode(){
		return $this->ProductCode;
	}

}