<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorie,App\Subcategorie,App\Product;


class CategoryController extends Controller
{
    public function index($id)
    {

    	$nome = Categorie::where('id', $id)->first()->nome;

    	$subcat = Categorie::find($id)->subcategories;

    	return view("cat.index",compact("subcat","nome"));
    }

    public function subcatIndex($id){

    	$cat = Subcategorie::find($id)->categorie;

    	$allsubcat = Subcategorie::select("id","nome")->where('categorie_id', $cat->id)->get();

    	$nome = Subcategorie::where('id', $id)->first()->nome;

    	//$elem = Subcategorie::find($id)->products;

        $elem = Subcategorie::find($id)->products()->paginate(24);

    	return view("subcat.index",compact("elem","nome","allsubcat","cat"));
    }
}
