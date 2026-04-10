<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\role_permission;

class AdminRoleController extends Controller
{
   // danh sách
    function list(){

        $permissions = Permission::all()->groupBy(function($permission){
            return explode('.',$permission->slug)[1];
        });

        $roles = Role::all();
        
        return view('admin.role.view',compact('permissions','roles'));
    }

    // thêm
    function store(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[a-zA-Z\s]+$/|unique:roles',
            'desc' => 'required|min:2|max:255|regex:/^[\p{L}\s]+$/u',
        ]);

        if(!$request->permission_id) return back()->with('status_failed','Tạo mới thất bại, bạn chưa chọn quyền');

        $role = Role::create([
            'name' => trim($request->input('name')),
            'desc' => trim($request->input('desc'))
        ]);

        $role->permissions()->attach($request->permission_id);

        return back()->with('status','Tạo mới thành công');
    }

    // xóa
    function destroy(Role $role){
        $role->delete();
        return back()->with('status','Xóa thành công');
    }

    // Cập nhật
    function edit(Request $request){
        $id = $request->id;
        $role = Role::find($id);

        $permissions = role_permission::where('role_id',$id)->get()->pluck('permission_id');

        $data = [
            'permissions' => $permissions,
            'role' => $role
        ];

        return response()->json($data);
    }

    function update(Request $request){
        $request->session()->put('role_id',$request->id);

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[a-zA-Z\s]+$/|unique:roles,name,'.$request->id,
            'desc' => 'required|min:2|max:255|regex:/^[\p{L}\s]+$/u',
        ]);

        if(!$request->permission_id) return back()->with('status_failed','Cập nhật thất bại, bạn chưa chọn quyền');

        $role = Role::find($request->id);

        $role->update([
            'name' => trim($request->input('name')),
            'desc' => trim($request->input('desc'))
        ]);

        $role->permissions()->sync($request->permission_id);

        return back()->with('status','Cập nhật thành công');
    }
}
