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
            "products" => Productsubcategorie::find($subcatid)->products()->paginate(24)
        ]);
    }

    private function available($av)
    {
        if ($av == 1) {
            return [
                "text" => "prodotto disponibile",
                "badge" => "success"
            ];
        }

        return [
            "text" => "prodotto non disponibile",
            "badge" => "danger"
        ];
    } 

    public function index($id)
    {

    	return view("details.main",[
    		"elem" => Product::find($id),
            "av" => $this->available(Product::find($id)->av)
    	]);
    }
}
