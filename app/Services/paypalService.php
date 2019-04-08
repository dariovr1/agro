<?php 

namespace App\Services;

use Mail;
use App\User;
use Log;
use Config;
use URL;
use Session;
use Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class paypalService {


   private $api_context;

    public function __construct()
    {
    /** PayPal api context **/
            $PayPal_conf = Config::get('paypal');
            $this->api_context = new ApiContext(new OAuthTokenCredential(
                $PayPal_conf['client_id'],
                $PayPal_conf['secret'])
            );
            $this->api_context->setConfig($PayPal_conf['settings']);
    }


    public function payWithPayPal($cartsItem,$totalPrice){

                $payer = new Payer();
                $payer->setPaymentMethod('PayPal');

                $item_1 = new Item();

                $item_1->setName('carrello numero #1') /** item name **/
                            ->setCurrency('EUR')
                            ->setQuantity(1)
                            ->setPrice($totalPrice); /** unit price **/

                $item_list = new ItemList();
                $item_list->setItems(array($item_1));

                $amount = new Amount();
                $amount->setCurrency('EUR')->setTotal($totalPrice);
                $transaction = new Transaction();
                $transaction->setAmount($amount)
                            ->setItemList($item_list)
                            ->setDescription('acquisto presso agroambiente');
                $redirect_urls = new RedirectUrls();
                        $redirect_urls->setReturnUrl(url("/return")) /** Specify return URL **/
                            ->setCancelUrl(url("/cancel"));
                $payment = new Payment();
                        $payment->setIntent('Sale')
                            ->setPayer($payer)
                            ->setRedirectUrls($redirect_urls)
                            ->setTransactions(array($transaction));
                        try {
                $payment->create($this->api_context);
                } catch (\PayPal\Exception\PPConnectionException $ex) {
                    if (Config::get('app.debug')) {
                            return Redirect::route('Status')->with('error','Connection timeout');
                    } else {
                         return Redirect::route('Status')->with('error','Some error occur, sorry for inconvenient');
                    }
                }
                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                                    break;
                    }
                }
                /** add payment ID to session **/
                Session::put('PayPal_payment_id', $payment->getId());
                if (isset($redirect_url)) {
                /** redirect to PayPal **/
                            return Redirect::away($redirect_url);
                }
                        return Redirect::route('Status')->with("error","errore sconosciuto");
         }


          public function Return(Request $request)
         {
             $payment = Payment::get($request->paymentId,$this->api_context);
             $ex = new PaymentExecution();
             $ex->setPayerId($request->PayerID);
             $result = $payment->execute($ex,$this->api_context);
             if( $result->getState() == "approved" ){
                dd("payment Approved");
             }
         }

          public function Cancel()
         {
             dd("cancel");
         }

         public function Status(){
             dd(Session::get("error"));
         }


}