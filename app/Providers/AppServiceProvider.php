<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Slideshow;


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
