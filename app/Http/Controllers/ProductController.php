<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Psr7\Query;
use Intervention\Image\Colors\Rgb\Channels\Red;

class ProductController extends Controller
{
    // tất cả sản phẩm
    function view()
    {
        session()->forget('parent_category_id');
        $products = Product::with('medias:object_id,url,type,is_main')->where('status', 'active')->latest()->paginate(12);
        $products_categories = Category::with('childs:parent_id,name')->where('type', 'product')->where('status', 'active')->whereNot('id', 2)->where('parent_id', 0)->get();
        return view('client.product.view', compact('products', 'products_categories'));
    }

    // Bộ lọc
    function filter(Request $request)
    {
        $search_value = $request->search_value;
        $category_value = $request->category_value;
        $order_value = $request->order_value;
        if ($category_value == '') {
            $category_childs = '';
            $type_products = '';
        } else {
            $category_childs = Category::where('parent_id', $category_value)->pluck('id');
            $type_products = Category::where('parent_id', $category_value)->get(['id', 'name']);
            $view_type = view('client.product.partials.type', compact('type_products'))->render();
        }
        $products = Product::query()->with('medias:object_id,url,type,is_main')
            ->when($search_value, function ($query, $value) {
                $query->where('name', 'like', '%' . $value . '%');
            })
            ->when($category_childs, function ($query, $value) {
                $query->whereIn('category_id', $value);
            })
            ->when($order_value, function ($query, $value) {
                $query->orderBy('price', $value);
            })
            ->where('status', 'active')
            ->latest()->paginate(12);

        $view = view('client.product.partials.list', compact('products'))->render();

        if ($category_value == '') {
            $data = [
                'view' => $view,
                'type_products' => $type_products,
            ];
        } else {
            $data = [
                'view' => $view,
                'type_products' => $type_products,
                'view_type' => $view_type
            ];
        }


        return response()->json($data);
    }

    // Sản phẩm theo danh mục
    // function category_view(Request $request)
    // {
    //     $uri =  $request->segments();
    //     $complete_slug = $uri[0] . "/" . $uri[1];
    //     $parent_category_id = Category::where('slug', $complete_slug)->value('id');
    //     $request->session()->put('parent_category_id',$parent_category_id);

    //     $categories = Category::with('products:category_id,name')->where('parent_id', $parent_category_id)->where('type', 'product')->where('status', 'active')->get(['id', 'name', 'slug']);
    //     $categories_id = Category::where('parent_id', $parent_category_id)->where('status', 'active')->pluck('id');

    //     $products = Product::whereIn('category_id', $categories_id)->where('status', 'active')->paginate(16);

    //     $path = $request->path();
    //     $title = Category::where('slug', $path)->value('name');

    //     return view('client.product.category-view', compact('categories', 'products', 'title'));
    // }


}
