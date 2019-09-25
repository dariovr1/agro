<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Config;
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
use URL;
use Session;
use Redirect;
use App\Services\cartService;
use App\Services\buyService;
use App\User;
use Cart;


class PaymentController extends Controller
{
    private $api_context;
    private $cart;
    private $buy;


    public function __construct(cartService $cart,buyService $buy)
    {
    /** PayPal api context **/

            $PayPal_conf = Config::get(getPaypalType());
            $this->api_context = new ApiContext(new OAuthTokenCredential(
                $PayPal_conf['client_id'],
                $PayPal_conf['secret'])
            );
            $this->api_context->setConfig($PayPal_conf['settings']);
            $this->cart = $cart;
            $this->buy = $buy;
    }


    public function payWithPayPal()
    {

        //faccio le operazioni di inserimento ordine / pivot table carts ecc.
        //todo: scrivere indirizzo spedizione in sessione
        //todo: scrivere l'ordine e ritornare id
        //todo: scrivere la pivot table con il carts id

        $this->buy->buyProducts();

        $totalcost = str_replace(",",".",$this->cart->getTotalCost());

        foreach(Cart::Content() as $item) {
            if ($item->id == 4270) {
                $totalcost = "0.01";
            }
        }


                $payer = new Payer();
                        $payer->setPaymentMethod('PayPal');
                $item_1 = new Item();
                $item_1->setName('Carrello di Agroambiente srl') /** item name **/
                            ->setCurrency('EUR')
                            ->setQuantity(1)
                            ->setPrice($totalcost); /** unit price **/
                $item_list = new ItemList();
                        $item_list->setItems(array($item_1));
                $amount = new Amount();
                $amount->setCurrency('EUR')->setTotal($totalcost);
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
                $this->api_context = 
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

            $arr = [];

             $payment = Payment::get($request->paymentId,$this->api_context);
             $ex = new PaymentExecution();
             $ex->setPayerId($request->PayerID);
             $result = $payment->execute($ex,$this->api_context);
             if( $result->getState() == "approved" ){

                $this->buy->orderCompleted(Session::get('idOrder'));


                sendEmail("emails.order",Cart::content()->toArray(),User::find(auth()->id())->email,"riepilogo acquisti agroambiente s.r.l");


            $arr["carrello"] = Cart::content()->toArray();

            $arr["spedizione"] = session("address");

            $arr["anagrafica"] = $this->buy->retriaveUserbyOrder(Session::get('idOrder'));


        sendEmail("emails.adminorder",[
            "user" => $arr["anagrafica"][0],
            "spedizione" => $arr["spedizione"],
            "carrello" => $arr["carrello"]
        ],"agroambientesrl@gmail.com","NUOVO ORDINE:: CODICE ORDINE ".Session::get('idOrder'));


                return redirect("/success/buy");

         }

        }


        public function ShowOkBuy(){
            return view("success.buy",[
                "user" =>  $this->buy->retriaveUserbyOrder(Session::get('idOrder'))
            ]);
        }


         public function Cancel()
         {
             dd("cancel");
         }
         public function Status(){
             dd(Session::get("error"));
         }
    }