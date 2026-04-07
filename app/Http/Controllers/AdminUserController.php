<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\user_role;

class AdminUserController extends Controller
{
    // danh sách
    function list()
    {
        $users = User::with('roles:id,name')->get();
        $total = User::all()->count();
        $active = User::where('status','active')->count();
        $unactive = User::where('status','unactive')->count();
        $roles = Role::all();
        return view('admin.user.view', compact('users','total','active','unactive','roles'));
    }

    // thêm
    function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\s]+$/u',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255|regex:/^[a-zA-Z0-9!@#$%^&*_-]+$/u|confirmed'
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
        if($user->id == Auth::user()->id) return back()->with('status_failed','Xóa thành viên thất bại');
        $user->delete();
        return back()->with('status', 'Xóa thành công');
    }

    // cập nhật
    function edit(Request $request)
    {
        $id = $request->id;
        $user_info = User::find($id);
        $roles = user_role::where('user_id',$id)->pluck('role_id');

        $data = [
            'user_info' => $user_info,
            'roles' => $roles
        ];

        return response()->json($data);
    }

    function update(Request $request)
    {
        // return $request->all();
        if ($request->input('password') == '' || $request->input('password_confirmation') == '') {

            // if($request->id == Auth::user()->id) return back()->with('status_failed','Cập nhật thông tin thất bại');

            $request->validate([
                'name' => 'required|min:2|max:255|regex:/^[\p{L}\s0-9]+$/u',
            ]);

            $user = User::find($request->input('id'));
            $user->update([
                'name' => $request->input('name'),
                'updated_at' => now()
            ]);

            $user->roles()->sync($request->input('roles'));

        }else{
            $request->validate([
                'name' => 'required|min:2|max:255|regex:/^[\p{L}\s0-9]+$/u',
                'password' => 'required|confirmed|min:8|max:255|'
            ]);

            $user = User::find($request->input('id'));
            $user->update([
                'name' => $request->input('name'),
                'password' => $request->input('password'),
                'updated_at' => now()
            ]);

            $user->roles()->sync($request->input('roles'));
        }

        return back()->with('status','Cập nhật thành công');
    }

    // Lọc + tìm kiếm
    function list_filter(Request $request){

        $filter_value = $request->filter_value ?? '';
        $search_value = $request->search_value ?? '';

        if(!$filter_value && !$search_value){
            $users = User::all();
        }

        if($filter_value && !$search_value){
            $users = User::where('status',$filter_value)->get();
        }else{
            $users = User::where('name','like','%'.$search_value.'%')->get();
        }

        if($filter_value && $search_value){
            $users = User::where('status',$filter_value)->where('name','like','%'.$search_value.'%')->get();
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

        $active = User::where('status','active')->count();
        $unactive = User::where('status','unactive')->count();

        $view = view('admin.user.partials.status',compact('status_value'))->render();

        $data = [
            'active' => $active,
            'unactive' => $unactive,
            'view' => $view
        ];
        return response()->json($data);
    }

    // Hành động
    function action(Request $request){

        $action = $request->input('action');
        $user_id = $request->input('user_id');
        
        if(!$action) return back()->withInput()->with('status_failed','Thất bại, bạn chưa chọn hành động !');
        if(!$user_id) return back()->withInput()->with('status_failed','Hành động thất bại, bạn chưa chọn User !');

        $current_user_id = Auth::user()->id;
        User::whereIn('id',$user_id)->whereNot('id',$current_user_id)->update(['status'=>$action,'updated_at'=>now()]);

        return back()->with('status','Thực hiện hành động thành công');
    }
}
