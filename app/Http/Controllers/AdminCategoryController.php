<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    // danh sách
    function view(){

        if(session('module_active') == 'posts'){
            return view('admin.post.view-categories');
        }

    }

    // thêm
    function store(Request $request){
        $request->validate([
            'name' => 'required|min:2|regex:/^[\p{L}\s]+$/u|unique:categories',
            'slug' => 'required',
        ]);

        $slug = Str::slug($request->input('slug'));
        $parent_id = $request->parent_id ? $request->parent_id : 0;
        
        if(session('module_active') == 'posts') $type = 'post';
        
        Category::create([
            'name' => $request->input('name'),
            'type' => $type,
            'slug' => $slug,
            'parent_id' => $parent_id,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('status','Tạo mới thành công');
    }
}
