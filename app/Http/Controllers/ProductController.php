<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // sản phẩm theo danh mục
    function view(Request $request)
    {
        $fullSlug = $request->path();
        $title = Category::where('slug', $fullSlug)->value('name');
        $this_category_id = Category::where('slug', $fullSlug)->value('id');
        $types = Category::where('parent_id', $this_category_id)->where('status','active')->pluck('id', 'name');
        $top_sale = Product::whereIn('category_id',$types)->where('status','active')->orderBy('sale_off','desc') ->first();

        // Tất cả
        if ($request->input('category') == '') {
            $products = Product::query()->with(['medias' => function ($query) {
                $query->where('type', 'product')->where('is_main', '0')->select('id', 'object_id', 'url');
            }])
                ->when($request->input('order'), function ($query, $value) {
                    $query->orderBy('price', $value);
                })
                ->whereIn('category_id', $types)
                ->where('status', 'active')
                ->latest()
                ->paginate(15);

        // Theo danh mục
        } else {
            $products = Product::query()->with(['medias' => function ($query) {
                $query->where('type', 'product')->where('is_main', '0')->select('id', 'object_id', 'url');
            }])
                ->when($request->input('category'), function ($query, $value) {
                    $query->where('category_id', $value);
                })
                ->when($request->input('order'), function ($query, $value) {
                    $query->orderBy('price', $value);
                })
                ->where('status', 'active')
                ->latest()
                ->paginate(15);
        }

        return view('client.product.view', compact('title', 'products', 'types','top_sale'));
    }

    // Bộ lọc
    function filter(Request $request)
    {
        $category_id = $request->category_id;
        $order_value = $request->order_value;

        if ($category_id == '') {
            $fullSlug = $request->path();
            $this_category_id = Category::where('slug', $fullSlug)->value('id');
            $types = Category::where('parent_id', $this_category_id)->pluck('id', 'name');
            $products = Product::query()->with(['medias' => function ($query) {
                $query->where('type', 'product')->where('is_main', '0')->select('id', 'object_id', 'url');
            }])
                ->when($order_value, function ($query, $value) {
                    $query->orderBy('price', $value);
                })
                ->whereIn('category_id', $types)
                ->where('status', 'active')
                ->latest()
                ->paginate(15);
        } else {
            $products = Product::query()->with(['medias' => function ($query) {
                $query->where('type', 'product')->where('is_main', '0')->select('id', 'object_id', 'url');
            }])
                ->when($category_id, function ($query, $value) {
                    $query->where('category_id', $value);
                })
                ->when($order_value, function ($query, $value) {
                    $query->orderBy('price', $value);
                })
                ->where('status', 'active')
                ->latest()
                ->paginate(15);
        }

        $view = view('client.product.partials.list', compact('products'))->render();
        $data = [
            'view' => $view,
        ];

        return response()->json($data);
    }

    // chi tiết
    function details(Request $request)
    {
        $product_info = Product::with(['variants','medias' => function ($query) {
            $query->where('type', 'product')->select('id', 'object_id', 'url', 'name', 'is_main');
        }])
            ->where('status', 'active')
            ->where('slug',$request->path())
            ->first();
        $variants = $product_info->variants->sortBy('price')->groupBy('slug');
        return view('client.product.details', compact('product_info','variants'));
    }
}
