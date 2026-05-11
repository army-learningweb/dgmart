<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Media;
use Illuminate\Support\Facades\File;

class AdminCategoryController extends Controller
{
    // danh sách
    function list()
    {
        $type = session('module_active') == 'posts' ? 'post' : 'product';

        $parent_categories = Category::where('type', $type)->where('parent_id', 0)->get();
        $categories = Category::with('user')->where('type', $type)->get();
        $categories = datatree($categories);
        $total = Category::where('type', $type)->count();
        $active = Category::where('type', $type)->where('status', 'active')->count();
        $unactive = Category::where('type', $type)->where('status', 'unactive')->count();

        $total_parent_categories = Category::where('type', $type)->where('parent_id', 0)->count();
        $total_child_categories = Category::where('type', $type)->where('parent_id', '>', 0)->count();
        
        return view('admin.category.view-categories', compact('parent_categories', 'categories', 'total', 'active', 'unactive', 'type', 'total_parent_categories', 'total_child_categories'));
    }

    // thêm
    function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->input('slug'))
        ]);

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{N}\p{P}\s]+$/u|unique:categories,name',
            'slug' => 'required|min:2|max:255|unique:categories',
        ]);

        $parent_id = $request->parent_category ? $request->parent_category : 0;

        if ($parent_id > 0) {
            $slug_parent = Category::where('id', $parent_id)->value('slug');
            $slug_parent = explode('/', $slug_parent);
            $slug = session('module_active') == 'posts' ? "bai-viet/" . $slug_parent[0] . "/" . Str::slug($request->input('slug')) : $slug_parent[0] . "/" . Str::slug($request->input('slug'));
        } else {
            $slug = session('module_active') == 'posts' ? "bai-viet/" . Str::slug($request->input('slug')) : "cua-hang/" . Str::slug($request->input('slug'));
        }

        $type = session('module_active') == 'posts' ? 'post' : 'product';

        $new_category = Category::create([
            'name' => trim($request->input('name')),
            'type' => $type,
            'slug' => $slug,
            'parent_id' => $parent_id,
            'user_id' => Auth::user()->id
        ]);

        Media::where('id', $request->input('category-file-id'))->where('type', 'category')->update(['object_id' => $new_category->id]);

        session()->forget('category-file');
        session()->forget('category-file-id');
        session()->forget($request->input('destroy-session'));
        session()->forget("{$request->input('destroy-session')}-id");
        session()->forget('old-category-file-img');
        session()->forget('old-category-file-id');

        return back()->with('status', 'Tạo mới thành công');
    }

    // cập nhật trạng thái
    function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id'
        ]);

        $status_value = $request->status_value;
        $id = $request->id;

        Category::where('id', $id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);

        $type = session('module_active') == 'posts' ? 'post' : 'product';

        $active = Category::where('type', $type)->where('status', 'active')->count();
        $unactive = Category::where('type', $type)->where('status', 'unactive')->count();

        $view = view('admin.category.partials.status', compact('status_value'))->render();

        $data = [
            'active' => $active,
            'unactive' => $unactive,
            'view' => $view
        ];
        return response()->json($data);
    }

    // cập nhật
    function edit(Request $request)
    {
        $id = $request->id;
        $category_info = Category::find($id);
        $img = Media::where('object_id', $category_info->id)->where('type', 'category')->first();
        if (isset($img)) {
            $data = [
                'category_info' => $category_info,
                'img_url' => asset($img->url),
                'old_category_file_id' => $img->id
            ];
        } else {
            $data = [
                'category_info' => $category_info,
            ];
        }

        return response()->json($data);
    }

    function update(Request $request)
    {
        $old_category_file_img = asset(Media::where('object_id', $request->input('id'))->where('type', 'category')->value('url'));
        $old_category_file_id = Media::where('object_id', $request->input('id'))->where('type', 'category')->value('id');

        if($old_category_file_id != null){
            $request->session()->put('old-category-file-img', $old_category_file_img);
            $request->session()->put('old-category-file-id', $old_category_file_id);
        }
        
        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{N}\p{P}\s]+$/u|unique:categories,name,' . $request->input('id'),
            'slug' => 'required|min:2|max:255|unique:categories,slug,' . $request->input('id'),
        ]);

        // - Kiểm tra slug
        $current_slug = Category::where('id', $request->input('id'))->pluck('slug')[0];

        if ($request->input('slug') == $current_slug) {
            $slug = $request->input('slug');
        } else {
            if ($request->parent_category > 0) {
                $slug_parent = Category::where('id', $request->parent_category)->value('slug');
                $slug_parent = explode('/', $slug_parent);
                $slug = session('module_active') == 'post' ? "bai-viet/" . $slug_parent[0] . "/" . Str::slug($request->input('slug')) : $slug_parent[0] . "/" . Str::slug($request->input('slug'));
            } else {
                $slug = session('module_active') == 'post' ? "bai-viet/" . Str::slug($request->input('slug')) : Str::slug($request->input('slug'));
            }
        }

        // - Kiểm tra parent_category
        $parent_id = $request->input('parent_category') ? $request->input('parent_category') : 0;

        // - Kiểm tra id chính là id của danh mục
        $current_id = Category::where('id', $request->input('id'))->pluck('id')[0];
        if ($current_id == $request->input('parent_category')) return back()->with('status_failed', 'Không thể chọn chính danh mục này');

        Category::where('id', $request->input('id'))->update([
            'name' => trim($request->input('name')),
            'slug' => $slug,
            'parent_id' => $parent_id,
            'updated_at' => now()
        ]);

        if ($request->input('old-category-file-id') == null) {
            $path = Media::where('object_id', $request->input('id'))->where('type', 'category')->value('url');
            if (isset($path)) {
                if (file_exists(public_path($path))) File::delete($path);
            }
            Media::where('object_id', $request->input('id'))->where('type', 'category')->delete();
        }

        if ($request->input('category-file-id') != null) {
            $path = Media::where('object_id', $request->input('id'))->where('type', 'category')->value('url');
            if (isset($path)) {
                if (file_exists(public_path($path))) File::delete($path);
            }
            Media::where('object_id', $request->input('id'))->where('type', 'category')->delete();

            Media::where('id', $request->input('category-file-id'))->where('type', 'category')->update([
                'object_id' => $request->input('id')
            ]);
        }

        session()->forget('category-file');
        session()->forget('category-file-id');
        session()->forget($request->input('destroy-session'));
        session()->forget("{$request->input('destroy-session')}-id");
        session()->forget('old-category-file-img');
        session()->forget('old-category-file-id');

        return back()->with('status', 'Cập nhật thành công');
    }

    // xóa
    function destroy(Category $category)
    {

        if ($category->slug == 2 || $category->slug == 1) return back()->with('status_failed', 'Bạn không thể xóa danh mục lưu trữ !');
        $child_categories_id = Category::where('parent_id', $category->id)->pluck('id');

        $safe_category_id = session('module_active') == 'posts' ? 1 : 2;

        if ($child_categories_id) {
            Category::whereIn('id', $child_categories_id)->update(['parent_id' => $safe_category_id, 'updated_at' => now()]);
        }

        $category->delete();
        return back()->with('status', 'Xóa thành công');
    }

    // hành động
    function action(Request $request)
    {
        $action = $request->input('action');
        $category_id = $request->input('categories_id');

        if (!$action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động !');
        if (!$category_id) return back()->withInput()->with('status_failed', 'Hành động thất bại, bạn chưa chọn danh mục !');
        Category::whereIn('id', $category_id)->update(['status' => $action, 'updated_at' => now()]);

        return back()->with('status', 'Cập nhật thành công');
    }

    // Xóa session ảnh
    function clearSession(Request $request){
        session()->forget('old-category-file-img');
        session()->forget('old-category-file-id');
    }
}
