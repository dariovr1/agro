<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Slideshow;

use Cart;

use App\Services\cartService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('components.slideshow',function($view){
            $view->with('slides',Slideshow::all());
        });

         $cart = new cartService();

         view()->composer('components.totale',function($view) use ($cart) {
            $view->with('subtotale',Cart::subtotal())
            ->with('weight',$cart->cartTotalWeight());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
