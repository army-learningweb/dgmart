<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    // danh sách
    function list()
    {

        $users = User::all();
        return view('admin.user.view', compact('users'));
    }

    // thêm
    function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|regex:/^[\p{L}\s]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^[a-zA-Z0-9!@#$%^&*_-]+$/u|confirmed'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return back()->with('status', 'Tạo mới thành công');
    }

    // xóa
    function destroy(User $user)
    {
        User::find($user->id)->delete();
        return back()->with('status', 'Xóa thành viên thành công');
    }

    // cập nhật
    function edit(Request $request)
    {
        $id = $request->id;
        $user_info = User::find($id);

        return response()->json($user_info);
    }

    function update(Request $request)
    {

        if ($request->input('password') == '' || $request->input('password_confirmation') == '') {
            $request->validate([
                'name' => 'required|min:2|regex:/^[\p{L}\s0-9]+$/u'
            ]);

            User::find($request->input('user_id'))->update([
                'name' => $request->input('name'),
                'updated_at' => now()
            ]);

        }else{
            $request->validate([
                'name' => 'required|min:2|regex:/^[\p{L}\s0-9]+$/u',
                'password' => 'required|confirmed|min:8|'
            ]);

            User::find($request->input('user_id'))->update([
                'name' => $request->input('name'),
                'password' => $request->input('password'),
                'updated_at' => now()
            ]);
        }

        return back()->with('status','Cập nhật thông tin thành công');
    }

    // Lọc
    function list_filter(Request $request){
        $filter_value = $request->filter_value;

        if(!$filter_value){
            $users = User::all();
        }else{
            $users = User::where('status',$filter_value)->get();
        }
       
        $view = view('admin.user.partials.list',compact('users'))->render();
        return response()->json($view);
    }

    // Cập nhật trạng thái
    function updateStatus(Request $request){
        $status_value = $request->status_value;
        $id = $request->id;

        User::where('id',$id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);

        $view = view('admin.user.partials.status',compact('status_value'))->render();

        return response()->json($view);
    }
}
