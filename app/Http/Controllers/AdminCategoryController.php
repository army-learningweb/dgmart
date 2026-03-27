<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    // danh sách
    function view()
    {
        $type = session('module_active') == 'posts' ? 'post' : 'product';

        $parent_categories = Category::where('type', $type)->where('parent_id', 0)->get();
        $categories = Category::with('user')->where('type', $type)->get();
        $categories = datatree($categories);
        $total = Category::where('type', $type)->count();
        $active = Category::where('type', $type)->where('status', 'active')->count();
        $unactive = Category::where('type', $type)->where('status', 'unactive')->count();

        return view('admin.category.view-categories', compact('parent_categories', 'categories', 'total', 'active', 'unactive','type'));
    }

    // thêm
    function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->input('slug'))
        ]);

        $request->validate([
            'name' => 'required|min:2|regex:/^[\p{L}\p{N}\s]+$/u|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ]);

        $slug = Str::slug($request->input('slug'));
        $parent_id = $request->parent_category ? $request->parent_category : 0;

        $type = session('module_active') == 'posts' ? 'post' : 'product';

        Category::create([
            'name' => $request->input('name'),
            'type' => $type,
            'slug' => $slug,
            'parent_id' => $parent_id,
            'user_id' => Auth::user()->id
        ]);

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
        return response()->json($category_info);
    }

    function update(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|regex:/^[\p{L}\p{N}\s]+$/u|unique:categories,name,' . $request->input('id'),
            'slug' => 'required|unique:categories,slug,' . $request->input('id')
        ]);

        // - Kiểm tra slug
        $current_slug = Category::where('id',$request->input('id'))->pluck('slug')[0];
        $slug = $current_slug == $request->input('slug') ? $request->input('slug') : Str::slug($request->input('slug'));

        // - Kiểm tra parent_category
        $parent_id = $request->input('parent_category') ? $request->input('parent_category') : 0;

        // - Kiểm tra id chính là id của danh mục
        $current_id = Category::where('id',$request->input('id'))->pluck('id')[0];
        if($current_id == $request->input('parent_category')) return back()->with('status_failed','Không thể chọn chính danh mục này');

        
        Category::where('id', $request->input('id'))->update([
            'name' => $request->input('name'),
            'slug' => $slug,
            'parent_id' => $parent_id,
            'updated_at' => now()
        ]);

        return back()->with('status','Cập nhật thành công');
    }

    // xóa
    function destroy(Category $category){

        if($category->id == 9 || $category->id == 17) return back()->with('status_failed','Bạn không thể xóa danh mục lưu trữ !');
        $child_categories_id = Category::where('parent_id',$category->id)->pluck('id');
        
        $safe_category_id = session('module_active') == 'posts' ? 9 : 17;

        if($child_categories_id){
            Category::whereIn('id',$child_categories_id)->update(['parent_id' => $safe_category_id, 'updated_at' => now()]);
        }
        
        Category::find($category->id)->delete();
        return back()->with('status','Xóa danh mục thành công');
    }

    // hành động
    function action(Request $request){

        $action = $request->input('action');
        $category_id = $request->category_id;

        if(!$action) return back()->withInput()->with('status_failed','Thất bại, bạn chưa chọn hành động !');
        if(!$category_id) return back()->withInput()->with('status_failed','Hành động thất bại, bạn chưa chọn danh mục !');


        Category::whereIn('id',$category_id)->update(['status'=>$action,'updated_at'=>now()]);

        return back()->with('status','Thực hiện hành động thành công');
    }
}
