<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\quantityService;

class CronJobController extends Controller
{

	private $qty;

	public function __construct(quantityService $qty){
		$this->qty = $qty;
	}

   public function updateQuantity(){
   		$this->qty->qtyUpdate();
   }

}
