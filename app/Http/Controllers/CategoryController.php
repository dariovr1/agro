<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Productcategorie;

class CategoryController extends Controller
{
    public function index($id)
    {
    	return view("cat.index",[
            "data" => Type::find($id)->productcategories
        ]);
    }

    public function subcatIndex($id){

    	return view("subcat.index",[
            "data" => Productcategorie::find($id)->productsub,
            "name" => Productcategorie::find($id)->name
        ]);
    }
}
