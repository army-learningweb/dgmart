<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Post;

class HomeController extends Controller
{
    function view()
    {
        
        $banners = Slider::where('status', 'active')->orderBy('order', 'asc')->get();
        $top_sale_product = Product::with('medias:object_id,url,is_main,type')->orderBy('sale_off', 'desc')->first();
        $new_products = Product::with('medias:object_id,url,is_main,type')->where('status', 'active')->where('sale_off', null)->orderBy('created_at', 'desc')->limit(10)->get();
        $sale_products = Product::with('medias:object_id,url,is_main,type')->where('status', 'active')->where('sale_off', '>', 0)->orderBy('sale_off', 'desc')->get();
        $category_accesories = Category::where('slug', 'san-pham/phu-kien-laptop')->value('id');
        $categories_child = Category::where('parent_id', $category_accesories)->where('type', 'product')->pluck('id');
        $accesories_product = Product::with('medias:object_id,url,is_main,type')->whereIn('category_id', $categories_child)->latest()->get();
        $posts = Post::with('media:object_id,url')->where('status','publish')->limit(4)->latest()->get( );
        $products_categories = Category::with(['childs:parent_id,name', 'media' => function ($query) {
            $query->where('type', 'category')->select('object_id', 'name', 'url');
        }])
            ->where('type', 'product')
            ->where('status', 'active')
            ->whereNot('id', 2)
            ->where('parent_id', 0)
            ->get();

        return view('client.home.view', compact('posts','banners', 'top_sale_product', 'new_products', 'sale_products', 'accesories_product','products_categories'));
    }
}
