<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PagesController@index');
Route::get('/pag/{slug}','PagesController@chisiamo');
Route::get('/pag/{slug}','PagesController@contatti');

Auth::routes();

Route::get('user/password-reset','ResetPasswordController@passwordReset');
Route::post('user/password-reset/create','ResetPasswordController@create');

//productDetailList

Route::get("subcat/{subcatid}/productlist",'ProductController@showProductList');


//quantita update
Route::get('quantityUpdate','UpdateDBController@qtyUpdate');
Route::get('updateimgdb','UpdateDBController@insertImgInDb');
Route::get('fixrefimg','UpdateDBController@setImgJpg');
Route::get('setext','UpdateDBController@setdbext');
Route::get('fixlowerupper','UpdateDBController@setImgJpg');

Route::get('cronjobqty','CronJobController@updateQuantity');
Route::get('cronjobqtylimit','CronJobController@updateQuantityLimit');

//saba

Route::get('setfiledata/{brand}/{filename}','SabaController@setfiledata');

//verifica e-mail e reset password
Route::get('verify/{id}/{mail}','verifyController@verifyEmailforRegister');

//aggiorna le quantità

Route::get('subtract/{codice}/{qty}','UpdateDBController@qtyUpdate');


Route::get("cart","CartController@index");
Route::patch("cart/update","CartController@update");
Route::get("cart/insert/{id}","CartController@insert");
Route::delete("cart/destroy/{id}","CartController@destroy");
Route::get("cart/checkout","CartController@checkout");

Route::get("category/{id}","CategoryController@index");

Route::get("subcat/{id}","CategoryController@subcatIndex");


Route::get("profile","ProfileController@index");
Route::get("profile/{profile}","ProfileController@show");

Route::POST("checkout","checkoutController@index");
Route::get("checkout/address","checkoutController@address");
Route::post("checkout/address/create","checkoutController@addressCreate");
Route::post("checkout/address/edit","checkoutController@addressEdit");
Route::get("checkout/spedizione","checkoutController@spedizione");
Route::post("checkout/spedizione/create","checkoutController@spedizioneCreate");
Route::get("checkout/paymentMethod","checkoutController@paymentMethod");
Route::post("checkout/paymentMethod/create","checkoutController@paymentMethodCreate");
Route::get("checkout/reviewOrder","checkoutController@reviewOrder");
Route::get("checkout/reviewOrderPay","checkoutController@reviewOrderPay");
Route::get("checkout/reviewOrderPay/success","checkoutController@reviewOrderPaySuccess");

Route::get("/paywithpaypal","PaymentController@payWithPayPal");
Route::get("/return","PaymentController@Return");

Route::get('chisiamo','PagesController@chisiamo');

Route::get("profile/{profile}/addbook","addBook@index");
Route::post("profile/{profile}/addbook/create","addBook@create");

Route::get("/detail/{id}","ProductController@index");

Route::get("/index/sc/{id}","SubcategoriesController@showCatIndex");

Route::get('/home', 'HomeController@index')->name('home');

//sucess

Route::get("/success/buy/{id}","PaymentController@ShowOkBuy");


//admin

Route::get('admin', function () {
    return view('admin.login');
});

Route::get('admin/pages/create', 'Admin\PagesController@index')->middleware('role:admin');
Route::post('admin/login',  function () {
    return view("admin.home");
});