<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class FixDbController extends Controller
{
    public function fixPrice(){

    	Product::find(17)->get()->map(function($value){
    		Product::find($value->id)->update([
    			"prezzo2" => (float)$value->prezzo
    		]);
    	});

    }
}
