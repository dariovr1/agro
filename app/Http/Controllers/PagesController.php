<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categorie;
use App\Product;

use App\Page;

class PagesController extends Controller
{
    public function index($titolo = 'Agroambiente s.r.l'){
    	return view("welcome");
    }


 	public function chisiamo($slug, $titolo = 'Agroambiente s.r.l'){

 		$page = Page::where('slug', $slug)->first();

    	return view("pages.index",compact('page'));
    }

    public function contatti($slug, $titolo = 'Agroambiente s.r.l'){

 		$page = Page::where('slug', $slug)->first();

    	return view("pages.index",compact('page'));
    }


}
