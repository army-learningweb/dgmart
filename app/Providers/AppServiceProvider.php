<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Product;

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
            $menus = Menu::where('status','active')->get();
            $view->with(compact('menus'));
        });

    }
}
