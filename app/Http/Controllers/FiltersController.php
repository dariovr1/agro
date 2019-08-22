<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EloquentBuilder;
use App\Models\Product;

class FiltersController extends Controller
{
     public function index(Request $request)
    {
        $product = EloquentBuilder::to(Product::class, $request->all());

        return view("filters.product",[
        	"products" => $product->get()
        ]);
  
    }
}
