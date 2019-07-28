<?php

namespace App\Services;

use App\Models\Brand;

class brandService{

	public function insertBrand($name){

			if(!Brand::recordExists($name)) {
				
				 $create = Brand::create(["name" => $name]);

				 print "brand {$name} è stato creato";

				 return $create->id;

			}

			print "brand {$name} già presente in db";

			return Brand::returnID($name);

	}


}