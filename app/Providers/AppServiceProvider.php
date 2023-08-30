<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.backend.partials.menucurso', function($view) {

            $cantidad = 0;
            if(Session::get('cart')){
                $carrito = Session::get('cart');
                $cantidad =  $carrito->cantidad ;
            }
        
            $view->with(['contador'=>$cantidad]);

        });
    }
}
