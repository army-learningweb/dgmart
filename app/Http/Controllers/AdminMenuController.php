<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminMenuController extends Controller
{
    // danh sách
    function list(){
        
        $categories_product = Category::where('type','product')->where('parent_id',0)->whereNot('id',2)->get();
        $categories_post = Category::where('type','post')->where('parent_id',0)->whereNot('id',1)->get();
        $menus = Menu::where('parent_id',0)->get();
        $list = datatree(Menu::all());
        $total = Menu::all()->count();
        $active = Menu::where('status','active')->count();
        $unactive = Menu::where('status','unactive')->count();
        return view('admin.menu.view',compact('categories_post','categories_product','menus','list','total','active','unactive'));
    }

    // thêm
    function store(Request $request){

        $parent_id = $request->input('parent_id') ? $request->input('parent_id') : 0;

        if($request->input('link-name') == null){
            if($request->input('categories-post') == null && ($request->input('categories-product') == null)){
                 return back()->with('failed','Vui lòng nhập tên hoặc chọn danh mục để tạo link Menu');
            }
        }
        
        if($request->input('link-name') != null && $request->input('categories-product') == null && $request->input('categories-post') == null){
            Menu::create([
                'name' => $request->input('link-name'),
                'slug' => Str::slug($request->input('link-name')),
                'parent_id' => $parent_id,
                'type' => 'custom',
                'user_id' => Auth::user()->id
            ]);

            return back()->with('status','Tạo mới thành công');
        }

        if(($request->input('categories-product') != null || $request->input('categories-post') != null)){

            $id = $request->input('categories-product') ? $request->input('categories-product') : $request->input('categories-post');
            $category_info = Category::find($id);
            $slug = $request->input('categories-product') ? "sanpham/".$category_info->slug : "baiviet/".$category_info->slug;
            $type = $category_info->type;
            $name = $category_info->name;

            Menu::create([
                'name' => $name,
                'slug' => $slug,
                'type' => $type,
                'parent_id' => $parent_id,
                'category_id' => $category_info->id,
                'user_id' => Auth::user()->id
            ]);

            return back()->with('status','Tạo mới thành công');
        }
    }

    // xóa
    function destroy(Menu $menu){
        $childs = Menu::where('parent_id',$menu->id)->pluck('id');
        Menu::whereIn('id',$childs)->delete();
        $menu->delete();
        return back()->with('status','Xóa thành công');
    }

    // Cập nhật trạng thái
    function updateStatus(Request $request)
    {
        $status_value = $request->status_value;
        $id = $request->id;

        Menu::where('id', $id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);

        $active = Menu::where('status', 'active')->count();
        $unactive = Menu::where('status', 'unactive')->count();
    
        $view = view('admin.menu.partials.status', compact('status_value'))->render();

        $data = [
            'active' => $active,
            'unactive' => $unactive,
            'view' => $view
        ];
        return response()->json($data);
    }

    // hành động
    function action(Request $request){
        
        if (!$request->action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động');
        if (!$request->menus_id) return back()->withInput()->with('status_failed', 'Hành động thất bại, chưa chọn Link');
        Menu::whereIn('id',$request->menus_id)->update(['status' => $request->action, 'updated_at' => now()]);
        return back()->with('status', 'Cập nhật thành công');
    }

    // cập nhật
    function edit(Request $request){
        $id = $request->id;
        $menu_info = Menu::find($id);
        return response()->json($menu_info);
    }

    function update(Request $request){
        $request->validate([
            'link-name' => 'required|min:2|max:255|regex:/^[\p{L}\p{N}\p{P}\s]+$/u',
        ]);
    }

}
