<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use App\Models\Product;

class AdminProductController extends Controller
{
    // danh sách
    function list()
    {
        $parent_categories = Category::where('type', 'product')->where('status', 'active')->where('parent_id', '>', 0)->get();
        $products = Product::with(['user:id,name', 'medias:object_id,url,type,is_main', 'category:id,name'])->latest()->paginate(5);
        $total = Product::all()->count();
        $active = Product::where('status', 'active')->count();
        $unactive = Product::where('status', 'unactive')->count();
        return view('admin.product.view', compact('parent_categories', 'products', 'total', 'active', 'unactive'));
    }

    // phân trang - Lọc - tìm kiếm
    function list_filter(Request $request)
    {
        $filter_value = $request->input('filter_value');
        $search_value = $request->input('search_value');
        $category_value = $request->input('category_value');
        $order_value = $request->input('order_value');

        $products = Product::query()->with(['user:id,name', 'medias:is_main,object_id,type,url', 'category:id,name'])
            ->when($filter_value, function ($query, $value) {
                $query->where('status', $value);
            })
            ->when($search_value, function ($query, $value) {
                $query->where('name', 'like', '%' . $value . '%');
            })
            ->when($category_value, function ($query, $value) {
                $query->where('category_id', $value);
            })
            ->when($order_value,function($query,$value){
                $query->orderBy('price',$value);
            })
            ->latest()->paginate(5);

        $view = view('admin.product.partials.list', compact('products'))->render();
        return response()->json($view);
    }

    // thêm
    function store(Request $request)
    {
        $request->validate([
            'code' => 'required|min:2|max:255|unique:products|regex:/^[a-zA-Z0-9\-\p{P}]+$/',
            'name' => 'required|min:2|max:255|regex:/^[\p{P}\p{L}\p{N}\s]+$/u',
            'desc' => 'required|min:2|max:255|regex:/^[\p{P}\p{L}\p{N}\p{S}\s]+$/u',
            'slug' => 'required|min:2|unique:products',
            'sale_off' => 'nullable|numeric|between:0,100',
            'product-file-id' => 'required',
            'price' => 'required|min:5|max:10',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->input('sale_off') > 0) {
            $price = $request->input('price');
            $sale_off = $request->input('sale_off');
            $price_sale_off = $price - ($price * ($sale_off / 100));
        } else {
            $price_sale_off = null;
        }

        $slug = Str::slug($request->input('slug'));

        $new_product = Product::create([
            'code' => trim($request->input('code')),
            'name' => trim($request->input('name')),
            'desc' => trim($request->input('desc')),
            'price' => $request->input('price'),
            'slug' => $slug,
            'sale_off' => $request->input('sale_off'),
            'price_sale_off' => $price_sale_off,
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
            'details' => $request->input('details')
        ]);

        Media::where('id', $request->input('product-file-id'))->where('type', 'product')->update(['object_id' => $new_product->id]);
        for ($i = 1; $i <= 4; $i++) {
            Media::where('id', $request->input("product-subfile-$i-id"))->where('type', 'product')->update(['object_id' => $new_product->id]);
            session()->forget("product-subfile-$i");
            session()->forget("product-subfile-$i-id");
            session()->forget("{$request->input('destroy-session')}-id");
            session()->forget($request->input('destroy-session'));
        }

        session()->forget('product-file');
        session()->forget('product-file-id');

        return back()->with('status', 'Tạo mới thành công');
    }

    // xóa
    function destroy(Product $product)
    {
        $files_path = Media::where('object_id', $product->id)->where('type', 'product')->get();
        foreach ($files_path as $file) {
            if (isset($file->url)) {
                if (file_exists($file->url)) File::delete($file->url);
                Media::where('object_id', $product->id)->where('type', 'product')->delete();
            }
        }
        $product->delete();

        return back()->with('status', 'Xóa thành công');
    }

    // Cập nhật
    function edit(Request $request)
    {
        $id = $request->id;
        $product_info = Product::find($id);
        $main_img = Media::where('object_id', $product_info->id)->where('type', 'product')->where('is_main', '0')->first();
        $detail_imgs = Media::where('object_id', $product_info->id)->where('type', 'product')->where('is_main', '1')->get(['url', 'id']);
        foreach ($detail_imgs as $img) {
            $img->url = asset($img->url);
        }
        $data = [
            'product_info' => $product_info,
            'img_url' => asset($main_img->url),
            'old_product_file_id' => $main_img->id,
            'detail_imgs' => $detail_imgs
        ];
        return response()->json($data);
    }

    function update(Request $request)
    {
        $old_product_file_img = asset(Media::where('object_id', $request->input('id'))->where('type', 'product')->value('url'));
        $old_product_file_id = asset(Media::where('object_id', $request->input('id'))->where('type', 'product')->value('id'));
        $request->session()->put('old-product-file-img', $old_product_file_img);
        $request->session()->put('old-product-file-id', $old_product_file_id);

        $detail_imgs = Media::where('object_id', $request->input('id'))->where('type', 'product')->where('is_main', "1")->get(['url', 'id']);
        if ($detail_imgs->count() > 0) {
            foreach ($detail_imgs as $key => $img) {
                $request->session()->put("old-product-subfile-" . $key + 1 . "-img", asset($img->url));
                $request->session()->put("old-product-subfile-" . $key + 1 . "-id", $img->id);
            }
        } else {
            for ($i = 1; $i <= 4; $i++) {
                if ($request->input("old-product-subfile-" . $i . "-id") != null) {
                    $detail_img = Media::where('id', $request->input("old-product-subfile-" . $i . "-id"))->where('type', 'product')->where('is_main', "1")->get(['url', 'id']);
                    foreach ($detail_img as $img) {
                        $request->session()->put("old-product-subfile-$i-img", asset($img->url));
                        $request->session()->put("old-product-subfile-$i-id", $img->id);
                    }
                }
            }
        }

        $request->validate([
            'code' => 'required|min:2|max:255|regex:/^[a-zA-Z0-9\-\p{P}]+$/|unique:products,code,' . $request->input('id'),
            'name' => 'required|min:2|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'desc' => 'required|min:2|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'slug' => 'required|min:2|unique:products,slug,' . $request->input('id'),
            'sale_off' => 'nullable|numeric|between:0,100',
            'old-product-file-id' => 'required',
            'price' => 'required|min:5|max:10',
            'category_id' => 'required|exists:categories,id'
        ]);

        $slug = Product::where('id', $request->input('id'))->value('slug');
        $slug = !isset($slug) ? $slug : Str::slug($request->input('slug'));

        if ($request->input('sale_off') > 0) {
            $price = $request->input('price');
            $sale_off = $request->input('sale_off');
            $price_sale_off = $price - ($price * ($sale_off / 100));
        } else {
            $price_sale_off = null;
        }

        Product::where('id', $request->input('id'))->update([
            'code' => trim($request->input('code')),
            'name' => trim($request->input('name')),
            'desc' => trim($request->input('desc')),
            'price' => $request->input('price'),
            'slug' => $slug,
            'sale_off' => $request->input('sale_off'),
            'price_sale_off' => $price_sale_off,
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
            'details' => $request->input('details')
        ]);

        // file phụ
        $old_sub_files_id = Media::where('object_id', $request->input('id'))->where('type', 'product')->where('is_main', "1")->pluck('id');

        for ($i = 1; $i <= 4; $i++) {
            $new_sub_files_id[] = $request->integer("old-product-subfile-$i-id");
        }

        foreach ($new_sub_files_id as $index => $new_id) {

            // Nếu thêm ảnh mới
            if ($new_sub_files_id[$index] != 0) {
                Media::where('id', $new_sub_files_id[$index])->where('type', 'product')->update(['object_id' => $request->input('id')]);
            }

            // Nếu xóa ảnh cũ
            if (!empty($old_sub_files_id[$index]) && ($new_sub_files_id[$index] == 0)) {
                $old_path = Media::where('id', $old_sub_files_id[$index])->where('type', 'product')->value('url');
                if ($old_path) {
                    if (File::exists(public_path($old_path))) File::delete($old_path);
                    Media::where('id', $old_sub_files_id[$index])->where('type', 'product')->delete();
                }
            }

            // Nếu mới khác cũ
            if (!empty($old_sub_files_id[$index]) && ($new_sub_files_id[$index] != $old_sub_files_id[$index])) {
                $old_path = Media::where('id', $old_sub_files_id[$index])->where('type', 'product')->value('url');
                if ($old_path) {
                    if (File::exists(public_path($old_path))) File::delete($old_path);
                    Media::where('id', $old_sub_files_id[$index])->where('type', 'product')->delete();
                }
            }
        }

        // file chính
        if ($request->input('product-file-id') != null) {
            $path = Media::where('object_id', $request->input('id'))->where('type', 'product')->value('url');
            if (isset($path)) {
                if (file_exists(public_path($path))) File::delete($path);
            }
            Media::where('object_id', $request->input('id'))->where('type', 'product')->where('is_main', '0')->delete();

            Media::where('id', $request->input('product-file-id'))->where('type', 'product')->where('is_main', '0')->update([
                'object_id' => $request->input('id')
            ]);
        }

        session()->forget('product-file');
        session()->forget('product-file-id');
        session()->forget('old-product-file-img');
        session()->forget('old-product-file-id');
        session()->forget($request->input('destroy-session'));
        session()->forget("{$request->input('destroy-session')}-id");

        for ($i = 1; $i <= 4; $i++) {
            session()->forget("product-subfile-$i");
            session()->forget("product-subfile-$i-id");
            session()->forget("old-product-subfile-$i-img");
            session()->forget("old-product-subfile-$i-id");
        }

        return back()->with('status', 'Cập nhật thành công');
    }

    // hành động
    function action(Request $request)
    {
        if (!$request->action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động');
        if (!$request->products_id) return back()->withInput()->with('status_failed', 'Hành động thất bại, chưa chọn sản phẩm');

        if ($request->action == 'destroy') {
            $imgs_path = Media::whereIn('object_id', $request->products_id)->where('type','product')->pluck('url');
            foreach ($imgs_path as $path) {
                if (file_exists($path)) {
                    File::delete($path);
                }
            }
            Media::whereIn('object_id', $request->products_id)->delete();
            $num_delete = Product::destroy($request->products_id);
            return back()->with('status', "Đã xóa $num_delete sản phẩm");
        }
        Product::whereIn('id',$request->products_id)->update(['status' => $request->action, 'updated_at' => now()]);
        return back()->with('status', 'Hành động thành công');
    }

    // Cập nhật trạng thái
    function updateStatus(Request $request)
    {
        $status_value = $request->status_value;
        $id = $request->id;

        Product::where('id', $id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);

        $active = Product::where('status', 'active')->count();
        $unactive = Product::where('status', 'unactive')->count();

        $view = view('admin.product.partials.status', compact('status_value'))->render();

        $data = [
            'active' => $active,
            'unactive' => $unactive,
            'view' => $view
        ];
        return response()->json($data);
    }
}
