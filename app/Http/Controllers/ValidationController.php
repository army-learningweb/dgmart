<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    function validation(Request $request){
        $request->validate([
            'email' => 'nullable|email',
            'password' => 'nullable|min:8|regex:/^[a-zA-Z0-9!@#$%^&*_-]+$/',
            'name' => 'nullable|min:2|regex:/^[\p{L}\p{N}\s]+$/u',
            'desc' => 'nullable|min:8|regex:/^[\p{L}\s]+$/u',
        ]);

        return response()->json();
    }
}
