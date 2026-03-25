<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
     // danh sách
    function view(){
        $permissions = Permission::all()->groupBy(function($permission){
            return explode('.',$permission->slug)[1];
        });

        // return $permissions;
        return view('admin.permission.view',compact('permissions'));
    }

    // thêm
    function store(Request $request){
        $request->validate([
            'name' => 'required|min:8|regex:/^[a-zA-Z0-9\s]+$/u|unique:permissions',
            'slug' => 'required|regex:/^[a-zA-Z0-9\-\.]+$/',
            'desc' => 'required|min:8|regex:/^[\p{L}\s]+$/u'
        ]);

        Permission::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'desc' => $request->input('desc')
        ]);

        return back()->with('status','Thêm quyền thành công');
    }

    // xóa
    function destroy(Permission $permission){
        Permission::find($permission->id)->delete();
        return back()->with('status','Xóa quyền thành công');
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
            'name' => 'required|min:8|regex:/^[a-zA-Z0-9\s]+$/u|unique:permissions,name,'.$request->id,
            'slug' => 'required|regex:/^[a-zA-Z0-9\-\.]+$/',
            'desc' => 'required|min:8|regex:/^[\p{L}\s]+$/u'
        ]);

        Permission::where('id',$request->id)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'desc' => $request->input('desc') 
        ]);

        $request->session()->forget('user_id');
        return back()->with('status','Cập nhật thông tin thành công');
    }
}
