<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Gate;

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

        // Phân quyền
        $permissons = Permission::all();
        foreach($permissons as $permission){
            Gate::define($permission->slug, function (User $user) use ($permission){
                return $user->hasPermission($permission->slug);
            });
        }
        
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

        // cart total 
        View::composer('components.bar.client-topbar',function($view){
            $cart_total = Cart::count();
            $view->with(compact('cart_total'));
        });
    }
}
