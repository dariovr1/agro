<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Log;

class ResetController extends Controller
{

	private function toKg($e){
		return round(($e/1000),2);
	}

	private function fromJson($id,$arr) {
       $elem = Product::where('id', $id)->pluck($arr["sec"])->all();
       $elem = json_decode($elem[0],true);
       return  ( isset($elem[ $arr["elem"] ] ) ) ? $elem[ $arr["elem"] ] : "";
    }

    public function index()
    {
    	$products = Product::all();

    	foreach($products as $product) {

    		if( $product->descrizione == "" ){
    			continue;
    		}

	    	$peso = $this->fromJson( $product->id, [
	    		"sec" => "descrizione",
	    		"elem" => "peso:"  
	    	]);
    	
	    	if(isset($peso)){

				$peso = str_replace("&nbsp;", " ",$peso);
		    	$peso = str_replace(" ", "",$peso);

		    	if(strpos($peso,"g") && !strpos($peso,"kg")){
		    		$peso = str_replace("g", "",$peso);
		    		$peso = $this->toKg($peso);
		    	}else if (strpos($peso,"kg")){
		    		$peso = str_replace("kg", "",$peso);
		    		$peso = str_replace(" ", "",$peso);
		    	}

		    	Product::where('id', $product->id)->update([
		    		"peso" => $peso
		    	]);
		   

	    	}

    	}

    }

    public function prezzo()
    {
    	$products = Product::all();

    	foreach($products as $product) {
    			$prezzo = $this->fromJson( $product->id, [
	    		"sec" => "orderinfo",
	    		"elem" => "grossPrice"  
	    	]);

    		 $prezzo = preg_replace("/[^0-9,.]/", "",$prezzo);

    		 if($prezzo != ""){
    		 	 Product::where('id', $product->id)->update([
		    		"prezzo" => str_replace(",",".",$prezzo)
		    	]);
    		 }

    	}
    }

}
