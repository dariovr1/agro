<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buy, App\ShipMethod, App\BuyCart, App\Pay, App\Supplement;
use App\Http\Requests\SupplAddressStoreRequest;
use App\Http\Requests\ShippingRequest;
use App\Http\Requests\PaymentsRequest;
use App\Mail\Order;
use Session;
use Auth;
use Cart;
use App\Services\paypalService;
use App\Services\cartService;



class checkoutController extends Controller
{

	public function index(Request $request)
	{
		Session::forget('cartItem');
		Session::push('cartItem',$request->cartItem);

		return redirect('checkout/address');
	}

	public function address()
	{
		return view("checkout.address");
	}

	public function addressCreate(SupplAddressStoreRequest $request)
	{

		session(["address" => $request->except('_token')]);

		 return redirect("checkout/spedizione")->with('success', 'indirizzo salvato con successo');
	}

	public function spedizione()
	{
		return view("checkout.shipping",[
			"shipping" => ShipMethod::all()
		]);
	}

	public function spedizioneCreate(ShippingRequest $request)
	{
		session(["shipping" => $request->except('_token')]);

		 return redirect("checkout/paymentMethod");
	}


	public function addressEdit()
	{
		dd("address edit");
	}


	public function paymentMethod()
	{
		return view("checkout.payments",[
			"pays" => Pay::all()
		]);
	}


	public function paymentMethodCreate(PaymentsRequest $request)
	{
		session(["payment" => $request->except('_token')]);

		return redirect("checkout/reviewOrder");
	}


	public function reviewOrder()
	{

		return view("checkout.order",[
			"address" => session("address"),
			"shipping" => session("shipping"),
			"payment" => session("payment"),
			"items" => Cart::Content(),
			"subtotal" => Cart::subtotal()
		]);
	}


	public function reviewOrderPaySuccess()
	{

		Buy::where('id', session('order'))->update(array('acquisto' => '1'));

			\Mail::to("jobamato@gmail.com")->send(new Order([
				"user" => Auth::user()->nome." ".Auth::user()->cognome
			])
		);
	}



}
