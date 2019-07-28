<?php

namespace App\Services;

use App\Models\Type;
use App\Models\Brand_type;

class typesService {


	private function insertRecordTypes($id,$catname){

		if( !Type::recordExists($catname) ) {
				 $create = Type::create([
				 	"name" => $catname
				 ]);

			 print "<br/>la types {$catname} è stato creata";
		}

		 if( !Brand_type::checkKeysExists($id, Type::returnID($catname) ) ) {
					 	Brand_type::create([
					 		"brand_id" => $id,
					 		"type_id" => Type::returnID($catname)
					 	]);

			print "<br/> relazione brand e type inserita";
		 }

			return Brand_type::returnID( $id, Type::returnID($catname) );
	}


	public function insertTypes($id,$catname){

			$catname = str_replace("-"," ",$catname);

			return $this->insertRecordTypes($id,$catname);

	}


}