<?php

namespace App\Services;
use Sunra\PhpSimple\HtmlDomParser;
use Exception;
use Log;
use App\Services\prodService;


class grabHTML {

	private $prod;

	public function __construct(prodService $prod){
		$this->logga();
		$this->prod = $prod;
		Log::info("è stato chiamato il servizio grabHTML");
	}

	public function getOrderInfoById($id){
		$prodInfo = $this->prod->getProdById($id);
		return $this->getOrderInfo($prodInfo["codice"]);
	}

	public function getQTYById($codice){
		return $this->getQTYOrderInfo($codice);
	}


	public function getQTYOrderInfo($codice) {
		try{
		$curlSES=curl_init(); 
		curl_setopt($curlSES,CURLOPT_URL,"https://www.granit-parts.it/productdetails?ids=".$codice);
		curl_setopt($curlSES,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curlSES,CURLOPT_HEADER, false); 
		curl_setopt($curlSES, CURLOPT_COOKIEFILE, "cookie.txt");
		curl_setopt($curlSES, CURLOPT_COOKIEJAR, "cookie.txt");
		$result=curl_exec($curlSES);
		curl_close($curlSES);
		$html = HtmlDomParser::str_get_html($result);
		Log::info("Parser:il valore del parser è ".$html);
		if($html === "" || $html === false) {
			Log::info("parser error");
			return 0;
		}
		$test = $html->find('template[data-json]', 0);
		$decodedText = html_entity_decode($test->attr["data-json"]);
		$myArray = json_decode($decodedText, true);
		return $myArray[0]["availableQuantity"];
		}catch (Exception $e) {
			Log::info("è stata riscontrata un eccezione durante il getOrderInfo ".$e);
		}
	}


	public function getOrderInfo($codice){
		try{
		$curlSES=curl_init(); 
		curl_setopt($curlSES,CURLOPT_URL,"https://www.granit-parts.it/productdetails?ids=".$codice);
		curl_setopt($curlSES,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curlSES,CURLOPT_HEADER, false); 
		curl_setopt($curlSES, CURLOPT_COOKIEFILE, "cookie.txt");
		curl_setopt($curlSES, CURLOPT_COOKIEJAR, "cookie.txt");
		$result=curl_exec($curlSES);
		curl_close($curlSES);
		$html = HtmlDomParser::str_get_html($result);
		$test = $html->find('template[data-json]', 0);
		$decodedText = html_entity_decode($test->attr["data-json"]);
		$myArray = json_decode($decodedText, true);
		return $myArray[0]["orderinfo"];

		}catch (Exception $e) {
			Log::info("è stata riscontrata un eccezione durante il getOrderInfo ".$e);
		}
	}


	public function logga(){
		try{
			$data = array(
				'_method' => "put",
				'referer' => "%2F",
				'user' => '350912',
				'password' => 'X04884'
			);

			$ch = curl_init("https://www.granit-parts.it/sessions");
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 'cookie.txt');
			$result = curl_exec($ch);
			curl_close($ch);
		}catch (Exception $e) {
			Log::info("è stata riscontrata un eccezione durante il logga() ".$e);
		}
	}

	public function getHtmlByCode($code) {
		$curlSES=curl_init(); 
		curl_setopt($curlSES,CURLOPT_URL,"https://www.granit-parts.it/product/".$code);
		curl_setopt($curlSES,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curlSES,CURLOPT_HEADER, false); 
		$result=curl_exec($curlSES);
		curl_close($curlSES);
		$html = HtmlDomParser::str_get_html($result);
		return $html;
	}
}