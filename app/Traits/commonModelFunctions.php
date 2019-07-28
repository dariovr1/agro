<?php

namespace App\Traits;


trait commonModelFunctions 
{

	public static function recordExists($e){
		return self::where('name', '=', $e)->exists();
	}

	public static function returnID($name){
		return self::where("name",$name)->pluck("id")->first();
	}

}