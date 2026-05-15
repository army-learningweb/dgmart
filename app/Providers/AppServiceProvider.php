<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // navigation client
        View::composer('components.bar.client-navigation-bar',function($view){
            $menus = Menu::where('status','active')->orderBy('order','asc')->get();
            $view->with(compact('menus'));
        });

        // footer navigation
        View::composer('components.footer.client-footer',function($view){
            $menus = Menu::where('status','active')->where('parent_id',0)->get();
            $view->with(compact('menus'));
        });

        // breadcrum
        View::composer('components.client-breadcrum',function($view){
            $menus = Menu::where('status','active')->where('parent_id',0)->get(['name','slug']);
            $categories = Category::where('status','active')->get(['name','slug']);
            $view->with(compact('menus','categories'));
        });

        // cart total 
        View::composer('components.bar.client-topbar',function($view){
            $cart_total = Cart::count();
            $view->with(compact('cart_total'));
        });
    }
}
