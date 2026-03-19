<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class AdminRoleController extends Controller
{
    // danh sách
    function view(){
        $roles = Role::all()->groupBy(function($role){
            return explode('.',$role->slug)[1];
        });

        return view('admin.role.view',compact('roles'));
    }

    // thêm
    function store(Request $request){
        $request->validate([
            'name' => 'required|min:8|regex:/^[a-zA-Z0-9\s]+$/u',
            'slug' => 'required|regex:/^[a-zA-Z0-9\-\.]+$/',
            'desc' => 'required|min:8|regex:/^[\p{L}\s]+$/u'
        ]);

        Role::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'desc' => $request->input('desc')
        ]);

        return back()->with('status','Thêm quyền thành công');
    }

    // xóa
    function destroy(Role $role){
        Role::find($role->id)->delete();
        return back()->with('status','Xóa quyền thành công');
    }

    // Cập nhật
    function edit(Request $request){
        $id = $request->id;
        $role = Role::find($id);
        return response()->json($role);
    }

    function update(Request $request){
        $request->validate([
            'name' => 'required|min:8|regex:/^[a-zA-Z0-9\s]+$/u',
            'slug' => 'required|regex:/^[a-zA-Z0-9\-\.]+$/',
            'desc' => 'required|min:8|regex:/^[\p{L}\s]+$/u'
        ]);

        Role::where('id',$request->role_id)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'desc' => $request->input('desc') 
        ]);

        return back()->with('status','Cập nhật thông tin thành công');
    }
}
