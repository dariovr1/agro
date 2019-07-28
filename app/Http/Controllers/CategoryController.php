<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Productcategorie,\App\Models\Subcategorie,\App\Models\Product;
use \App\Models\Type;


class CategoryController extends Controller
{
    public function index($id)
    {
    	return view("cat.index",[
            "productcategorie" => Type::find($id)->productcategories,
            "name" => Type::find($id)->name
        ]);
    }

    public function subcatIndex($id){

        //$elem = Subcategorie::find($id)->products()->paginate(24);

    	return view("subcat.index",[
            "subcategories" => Productcategorie::find($id)->subcategories,
            "name" => Productcategorie::find($id)->name
        ]);
    }
}
