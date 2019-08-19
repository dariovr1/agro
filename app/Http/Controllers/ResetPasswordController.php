<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ResetPasswordRequest;

use App\User;


class ResetPasswordController extends Controller
{
     public function passwordReset()
    {
    	return view('auth.passwords.reset');
    }

    public function create(ResetPasswordRequest $request){
    	User::where("email",$request->email)->update([
    		"password" => \Hash::make($request->password)
    	]);

    	return redirect()->back()->with('success','utente aggiornato correttamente');
    }

}
