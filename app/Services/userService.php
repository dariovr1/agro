<?php

namespace App\Services;
use App\User;
use Log;

class userService {
	
	public function isUserMailExist($id,$mail){

		$isExist = User::where(['id' => $id,'email' => $mail])->exists();

		if($isExist){
			$this->updateParams([
				"id" => $id,
				"email_verified_at" => now()
			]);
		}

		return $isExist;
	}

	public function updateParams($data){
		User::where('id', $data["id"])->update($data);
	}


	public function isUserVerified($id) {
		return User::where('id',$id)->pluck('email_verified_at')->first();
	}


	public function verifiedOrRedirect($id){
		if($this->user->isUserVerified($id) != null){
    		return redirect('/');
    	}
	}

}