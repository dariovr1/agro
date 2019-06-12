<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Services\prodService;

class ProductController extends Controller
{

    private $prodService;

    public function __construct(prodService $prod){
        $this->prodService = $prod;
    }


    public function index($id)
    {
    	return view("details.index",[
    		"elem" => Product::find($id),
    		"info" => Product::find($id)->descrizione,
            "status" => json_decode($this->prodService->getStatusBadge($id), true)
    	]);
    }
}
