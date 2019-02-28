<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use auth;

use App\Prov;

class ProfileController extends Controller
{
    public function index()
    {
    	if (auth()->user()) {
    		return redirect('profile/'.auth()->id());
    	}
    }

     public function show()
    {

    	return view("profile.single");	
    }

      public function edit()
    {


        return view("profile.single");  
    }

}
