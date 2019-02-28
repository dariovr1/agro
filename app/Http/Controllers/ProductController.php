<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function index($id)
    {
    	$elem = Product::find($id);

    	$elem->info = json_decode(str_replace(" tecnici","",$elem->descrizione));

    	$info = $elem->info;

    	return view("detail",compact("elem","info"));
    }
}
