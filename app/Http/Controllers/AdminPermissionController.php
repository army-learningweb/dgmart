<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
     // danh sách
    function list(){
        $permissions = Permission::all()->groupBy(function($permission){
            return explode('.',$permission->slug)[1];
        });

        // return $permissions;
        return view('admin.permission.view',compact('permissions'));
    }

    // thêm
    function store(Request $request){

        $request->validate([
            'name' => 'required|min:8|max:255|regex:/^[a-zA-Z0-9\s]+$/u|unique:permissions',
            'slug' => 'required|min:2|max:255|regex:/^[a-zA-Z0-9\-\.]+$/|unique:permissions',
            'desc' => 'required|min:8|max:255|regex:/^[\p{L}\s]+$/u'
        ]);

        Permission::create([
            'name' => trim($request->input('name')),
            'slug' => trim($request->input('slug')),
            'desc' => trim($request->input('desc'))
        ]);

        return back()->with('status','Tạo mới thành công');
    }

    // xóa
    function destroy(Permission $permission){
        $permission->delete();
        return back()->with('status','Xóa thành công');
    }

    // Cập nhật
    function edit(Request $request){
        $id = $request->id;
        $permission = Permission::find($id);
        return response()->json($permission);
    }

    function update(Request $request){

        $request->session()->put('user_id',$request->id);

        $request->validate([
            'name' => 'required|min:8|max:255|regex:/^[a-zA-Z0-9\s]+$/u|unique:permissions,name,'.$request->id,
            'slug' => 'required|min:2|max:255|regex:/^[a-zA-Z0-9\-\.]+$/|unique:permissions,slug,'.$request->id,
            'desc' => 'required|min:8|max:255|regex:/^[\p{L}\s]+$/u'
        ]);

        Permission::where('id',$request->id)->update([
            'name' => trim($request->input('name')),
            'slug' => trim($request->input('slug')),
            'desc' => trim($request->input('desc')) 
        ]);

        $request->session()->forget('user_id');
        return back()->with('status','Cập nhật thành công');
    }
}
