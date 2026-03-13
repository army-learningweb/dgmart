<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    function list(){

        $users = User::all();
        return view('admin.user.view',compact('users'));
    }

    function store(Request $request){

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

        return back()->with('status','Tạo mới thành công');
    }
}
