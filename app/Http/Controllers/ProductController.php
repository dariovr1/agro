<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Services\grabHTML;

class ProductController extends Controller
{

	private $html;

	public function __construct(grabHTML $html)
    {
        $this->html = $html;
    }


    public function index($id)
    {
    	return view("detail",[
    		"elem" => Product::find($id),
    		"info" => Product::find($id)->descrizione,
    		"detail" => $this->html->getOrderInfoById($id)
    	]);
    }
}
