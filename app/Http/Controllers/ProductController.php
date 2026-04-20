<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Intervention\Image\Colors\Rgb\Channels\Red;

class ProductController extends Controller
{
    // tất cả sản phẩm
    function view()
    {
        session()->forget('parent_category_id');

        $products = Product::with('medias:object_id,url,type,is_main')->where('status', 'active')->paginate(16);
        $products_categories = Category::with('childs:parent_id,name')->where('type', 'product')->where('status', 'active')->whereNot('id', 2)->where('parent_id', 0)->get();
        $total = Product::where('status', 'active')->count();
        $title = 'Tất cả';
        return view('client.product.view', compact('products', 'total', 'products_categories', 'title'));
    }

    // Sản phẩm theo danh mục
    function category_view(Request $request)
    {
        $uri =  $request->segments();
        $complete_slug = $uri[0] . "/" . $uri[1];
        $parent_category_id = Category::where('slug', $complete_slug)->value('id');
        $request->session()->put('parent_category_id',$parent_category_id);

        $categories = Category::with('products:category_id,name')->where('parent_id', $parent_category_id)->where('type', 'product')->where('status', 'active')->get(['id', 'name', 'slug']);
        $categories_id = Category::where('parent_id', $parent_category_id)->where('status', 'active')->pluck('id');

        $products = Product::whereIn('category_id', $categories_id)->where('status', 'active')->paginate(16);

        $path = $request->path();
        $title = Category::where('slug', $path)->value('name');

        return view('client.product.category-view', compact('categories', 'products', 'title'));
    }

    // Bộ lọc
    function filter(Request $request)
    {

        $filter_value = $request->filter_value;
        $order_value = $request->order_value;

        if ($filter_value == '' || $filter_value == 'all') {
            $categories_id = Category::where('parent_id',session('parent_category_id'))->where('status', 'active')->pluck('id');
            if($order_value != 'base'){
                 $products = Product::query()->with('medias:object_id,url,type,is_main')
                ->when($order_value, function ($query, $value) {
                    $query->orderBy('price', $value);
                })
                ->whereIn('category_id',$categories_id)->where('status', 'active')->paginate(16);
            }else{
                $products = Product::query()->with('medias:object_id,url,type,is_main')
                ->whereIn('category_id',$categories_id)->where('status', 'active')->paginate(16);
            }
        } else {
            if($order_value != 'base'){
                $products = Product::query()->with('medias:object_id,url,type,is_main')
                ->when($filter_value, function ($query, $value) {
                    $query->where('category_id', $value);
                })
                ->when($order_value, function ($query, $value) {
                    $query->orderBy('price', $value);
                })
                ->where('status', 'active')->paginate(16); 
            }else{
                $products = Product::query()->with('medias:object_id,url,type,is_main')
                ->when($filter_value, function ($query, $value) {
                    $query->where('category_id', $value);
                })
                ->where('status', 'active')->paginate(16); 
            }
        }

        $path = $request->path();
        $title = Category::where('slug', $path)->value('name');
        $view = view('client.product.partials.list', compact('products', 'title'))->render();
        return response()->json($view);
    }
}
