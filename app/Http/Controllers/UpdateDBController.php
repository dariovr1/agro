<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\quantityService;
use App\Product;
use Illuminate\Support\Facades\DB;
use Log;



class UpdateDBController extends Controller
{

	private $quantityService;

	public function __construct(quantityService $quantity){
		$this->quantityService = $quantity;
	}

	public function qtyUpdate($codice,$qty)
	{
		if ( $this->quantityService->checkAPIqtyUpdate($codice,$qty) ){
			 $this->quantityService->updateQuantityDatabaseByCode($codice,$qty);
		 }
	}

}
