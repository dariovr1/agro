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

          view()->composer('components.sidebar-category',function($view){
            $view->with('types',\App\Models\Type::all());
        });


         view()->composer('components.header',function($view){
            $view->with('types',\App\Models\Type::all());
        });


         $cart = new cartService();

         view()->composer('components.checkout.totale',function($view) use ($cart) {
            $view->with('subtotale',Cart::subtotal())
                 ->with('weight',$cart->cartTotalWeight())
                 ->with('totale',$cart->getTotalCost());
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
