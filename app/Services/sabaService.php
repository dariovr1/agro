<?php

namespace App\Services;

use Mail;
use App\Product;
use Log;
use DB;
use App\Services\brandService;


class sabaService {

	private $FILEPATH = "file/saba/";
	private $ext = ".txt";
	private $brandname;
	private $catname;
	private $brands;
	private $brandCategories;
	private $categories;
	private $subcategoriesService;
	private $path;

	public function __construct($brand,$filename) {
		$this->FILEPATH = $this->FILEPATH."{$brand}/"."{$filename}".$this->ext;
		$this->path = [
			"brand" => $brand,
			"filename" => $filename
		];
		$this->brandname = $brand;
		$this->catname = $filename;
		$this->inizialize();
	}


	private function inizialize() {
		$this->brands = new brandService();
		$this->types = new typesService();
		$this->prodcat = new productcategoriesService();
		$this->init();
	}

	private function init() {
	    $brand_id = $this->brands->insertBrand($this->brandname);
	    $brand_type_id = $this->types->insertTypes($brand_id,$this->catname);
	    $this->prodcat->insertProdCat($brand_type_id,$this->path);
	}

}