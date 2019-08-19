<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productsubcategorie;

class ProductController extends Controller
{
    public function showProductList($subcatid)
    {
        return view("products.index",[
            "products" => Productsubcategorie::find($subcatid)->product()->paginate(24)
        ]);
    }

    public function index($id)
    {

    	return view("details.main",[
    		"elem" => Product::find($id)
    	]);
    }
}
