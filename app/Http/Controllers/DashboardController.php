<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Post;
use App\Models\Order;

class DashboardController extends Controller
{
    function view(){

        $product_count = Product::count();
        $post_count = Post::count();
        $revenue = num_format(Order::where('status','delivered')->sum('price'));
        $order_count = Order::where('status','pending')->count();

        $orders = Order::orderBy('created_at','desc')->limit(6)->get();
        $products = Product::with(['medias' => function ($query) {
            $query->where('type', 'product')->where('is_main', 1)->select('id', 'object_id', 'url');
        }])
        ->orderBy('sold','desc')
        ->limit(5)
        ->get();

        return view('admin.dashboard.view',compact('product_count','post_count','revenue','order_count','orders','products'));
    }
}
