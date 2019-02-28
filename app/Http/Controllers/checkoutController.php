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



class checkoutController extends Controller
{

	private $array = [];

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
		Session::forget('address');
		Session::push('address', [
			 'nominativo' => $request->nome." ".$request->cognome,
             'presso' => $request->presso,
             'via' => $request->via,
             'cap' => $request->cap,
             'citie_id' => $request->comune,
             'prov_id' => $request->provincia,
             'presso' => $request->presso,
             'azienda' => $request->azienda,
             'email' => $request->email,
             'telefono'=> $request->telefono
		]);


		/*
		 Supplement::create([
                'nominativo' => $request->nome." ".$request->cognome,
                'presso' => $request->presso,
                'via' => $request->via,
                'cap' => $request->cap,
                'citie_id' => $request->comune,
                'prov_id' => $request->provincia,
                'user_id' => auth()->id(),
                'presso' => $request->presso,
                'azienda' => $request->azienda,
                'email' => $request->email,
                'telefono'=> $request->telefono
            ]);
        */

		 return redirect("checkout/spedizione")->with('success', 'indirizzo salvato con successo');
	}

	public function spedizione()
	{

		$shipping = ShipMethod::all();

		return view("checkout.shipping",compact("shipping"));
	}

	public function spedizioneCreate(ShippingRequest $request)
	{
		session(["shipping" => $request->shipping]);

		 return redirect("checkout/paymentMethod");
	}


	public function addressEdit()
	{
		dd("address edit");
	}


	public function paymentMethod()
	{
		$pays = Pay::all();
		return view("checkout.payments",compact('pays'));
	}


	public function paymentMethodCreate(PaymentsRequest $request)
	{
		session(["payment" => $request->payment]);

		return redirect("checkout/reviewOrder");
	}


	public function reviewOrder()
	{
		$shipping = ShipMethod::find( Session::get("shipping") , ['nome']);

	    $pay = Pay::find( Session::get("payment") , ['nome']);

		return view("checkout.order",compact('shipping','pay'));
	}


	public function reviewOrderCreate()
	{

		$arr = Session::get("address")[0];

		$arr["user_id"] = Auth::id();

		$id_suppl = Supplement::create($arr)->id;

		//creo il codice buys = ordine
		$buy = new Buy;
	    $buy->user_id = Auth::id();
	    $buy->supplement_id = intval($id_suppl);
	    $buy->pay_id = intval(Session::get("payment"));
	    $buy->shipmethod_id = intval(Session::get("shipping"));
	    $buy->save();
	    $lastid = $buy->id;

		foreach(Session::get('cartItem')[0] as $cart) {
			$buy = new BuyCart;
	   		$buy->buy_id = $lastid;
	   		$buy->cart_id = intval($cart);
	   		$buy->save();
		}

		session::forget("order");

		session(["order" => $lastid]);

		return redirect("checkout/reviewOrderPay");
	}

	public function reviewOrderPay()
	{
		return view("checkout.orderpay");
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
