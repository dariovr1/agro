<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AddressStoreRequest;

use Auth;

use App\Supplement;

class addBook extends Controller
{
   public function index($id)
   {
   		return view("profile.indirizzi");
   }

     public function create(AddressStoreRequest $request)
   {

   		 Supplement::create([
                'nominativo' => $request->nominativo,
                'presso' => $request->presso,
                'via' => $request->via,
                'cap' => $request->cap,
                'citie_id' => $request->comune,
                'prov_id' => $request->provincia,
                'user_id' => auth()->id()
            ]);

       return redirect()->back()->with('success', 'indirizzo creato con successo');
   }
}
