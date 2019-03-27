<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subcategorie;

class SubcategoriesController extends Controller
{
    function showCatIndex($id) {
    	return view("welcome",[
    		"nome" => Subcategorie::where('id', $id)->first()->nome,
    		"elem" => Subcategorie::find($id)->products()->paginate(24)
    	]);
    }
}
