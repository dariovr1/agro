<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\userService;


class verifyController extends Controller
{
	private $user;

	 public function __construct(userService $user)
    {
    	$this->user = $user;
    }


      public function verifyEmailforRegister($id,$mail)
    {

    	$this->verifiedOrRedirect($id);

    	return view("success.confirmmail",[
    		"exist" => $this->user->isUserMailExist($id,$mail),
    		"mail" => $mail 
    	]);
    }

}
