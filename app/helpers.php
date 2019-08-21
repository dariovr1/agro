<?php 

use App\Product;
use App\Models\Cart;
use App\Categorie;


if(!function_exists("surplusIvaPrezzo")) {

	function surplusIvaPrezzo($value) {
		$iva = 22;
		$surplus = 30;

		//calcolo surplus
		$prezzo_surplus = ($value / 100) * 30;

		$prezzo_iva = ($prezzo_surplus / 100) * 22; 

		return $value + $prezzo_surplus + $prezzo_iva;

	}
}

if(!function_exists("replacebyD")) {

	function replacebyD($filename){
		$extension_pos = strrpos($filename, '.'); // find position of the last dot, so where the extension starts
		$thumb = substr($filename, 0, $extension_pos) . ' D' . substr($filename, $extension_pos);

		return $thumb;
	}
}


if(!function_exists("compareArray")) {
	function compareArray($arr1,$arr2){
		return $arr1 == $arr2;
	}
}



if(!function_exists("FormatNumber")) {
	function FormatNumber($value){
		return number_format($value,(int)$value);
	}
}


if(!function_exists("sendEmail")) {
	function sendEmail($view,$data,$to,$subject){
		Mail::send($view, ['data'=> $data], function ($message) use ($to,$subject) {
	            $message->from('noreply@agroambientesrl.com', 'Info Agroambiente')
	            ->to($to)
	            ->cc("agroambientesrl@gmail.com")
	            ->bcc("jobamato@gmail.com")
	            ->subject($subject);
	        });
	}
}

if (! function_exists('checkFormError')) {
	function checkFormError($data){
		if(\Input::old($data) != "") {
			dd("struba!");
		}
	}
}

if (! function_exists('getComune')) {
    function getComune($id) {
    	$res =  $res = App\Citie::find($id,["comune"]);
       return  $res["comune"];
    }
}

if (! function_exists('getProv')) {
    function getProv($id) {
    	$res = App\Prov::find($id,["provincia"]);
       return  $res["provincia"];
    }
}

if (! function_exists('getCategory')) {
    function getCategory() {
       return  Categorie::all();
    }
}

if (!function_exists('getCat')){
	function getCat($id){
		 $res = App\Product::find(1)->categorie;
		 return $res["nome"];
	}
}

if (!function_exists('getTotalPeso')){
	function getTotalPeso()
	{
		$total = 0;

		foreach(Cart::all() as $cart){
			$total += Product::find($cart->product_id)->peso * $cart->quantita;
		}

		return $total;
	}
}


if (!function_exists('trasporto')){
	function trasporto(){
		$peso = getTotalPeso();

		if ($peso <= 3) {
			return "6.38";
		}else if ( $peso > 3 && $peso <= 5 ){
			return "7.78";
		}else if ( $peso > 5 && $peso <= 10 ){
			return "8.80";
		}else if ( $peso > 10 && $peso <= 20 ){
			return "13.05";
		}else if ( $peso > 20 && $peso <= 30 ){
			return "16.37";
		}else if ( $peso > 30 && $peso <= 40 ){
			return "27.37";
		}else if ( $peso > 40 && $peso <= 50 ){
			return "38.37";
		}else if ( $peso > 50 && $peso <= 60 ){
			return "49.37";
		}else if ( $peso > 60 && $peso <= 70 ){
			return "60.37";
		}

	}
}

if (!function_exists('totalCart')){
	function totalCart(){
		$total = 0;
		$carts = Cart::all();

		foreach($carts as $cart){
			$value = str_replace (',', '.' ,Product::find($cart->product_id)->prezzo);
			$total += floatval($value) * $cart->quantita;
		}

		return $total;
	}
}

if (! function_exists('fromJson')) {
    function fromJson($id,$c,$f) {
       $elem = Product::where('id', $id)->pluck($c)->all();
       $elem = json_decode($elem[0],true);
       return  ( isset($elem[$f]) ) ? $elem[$f] : "";
    }
}