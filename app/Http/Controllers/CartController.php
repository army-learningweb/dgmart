<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    // Thêm
    function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $image = $request->input('product_img');

        $options = '';
        $variants = '';
        if ($request->input('options')) {
            $options = array_values($request->input('options'));
            $variants = Variant::whereIn('id', $options)->get(['slug', 'name', 'price']);
        }

        $price = $request->input('total-price');
        $base_price = $request->input('base-price');
        $price_sale_off = $request->input('price-sale-off');
        $price_accesories = $request->input('price-accesories');
        $product = Product::find($product_id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'variants' => $variants,
                'sale_off' => $product->sale_off,
                'base_price' => $base_price,
                'price_sale_off' => $price_sale_off,
                'price_accesories' => $price_accesories,
                'image' => $image,
                'stock' => $product->quantity
            ]
        ]);


        return redirect()->route('gio-hang')->with('status', 'Đã thêm sản phẩm vào giỏ hàng');
    }

    // danh sách
    function view()
    {

        $carts = Cart::content();
        $top_sale = Product::orderBy('sale_off', 'desc')->first();
        $category_accesories = Category::where('slug', 'phu-kien-laptop')->value('id');
        $categories_child = Category::where('parent_id', $category_accesories)->where('type', 'product')->pluck('id');
        $accesories_product = Product::with('medias:object_id,url,is_main,type')->whereIn('category_id', $categories_child)->latest()->get();

        return view('client.cart.view', compact('carts', 'top_sale', 'accesories_product'));
    }

    // xóa
    function remove($rowId = '')
    {
        Cart::remove($rowId);
        return back()->with('status', 'Xóa thành công');
    }

    // cập nhật
    function update(Request $request)
    {
        $qty = $request->input('qty');
        $rowId = $request->input('rowId');
        Cart::update($rowId, $qty);
        $carts = Cart::content();
        if (count($carts) > 0) {
            $view = view('client.cart.partials.list', compact('carts'))->render();
        } else {
            $view = view('client.cart.partials.empty_cart')->render();
        }
        $cart_count = Cart::count();
        $data = [
            'view' => $view,
            'cart_count' => $cart_count
        ];
        return response()->json($data);
    }

    // xóa toàn bộ
    function destroy()
    {
        Cart::destroy();
        return back();
    }
}
