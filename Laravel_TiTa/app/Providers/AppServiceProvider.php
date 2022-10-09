<?php

namespace App\Providers;

use App\Cart;
use App\DanhMuc;
use Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('Hambuger.master',function ($view){
           $danhmuc = DanhMuc::all();
           $view->with('danhmuc',$danhmuc);
        });

        view()->composer(['Hambuger.master','Hambuger.Page.dathang'],function($view){
            if (Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty,'note'=>$cart->note]);
            }
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
