<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    function validation(Request $request){
        $request->validate([
            'email' => 'nullable|email',
            'password' => 'nullable|min:8|max:255|regex:/^[a-zA-Z0-9!@#$%^&*_-]+$/',
            'name' => 'nullable|min:2|max:255|regex:/^[\p{L}\p{N}\s]+$/u',
            'desc' => 'nullable|min:2|max:255|regex:/^[\p{L}\p{N}\p{P}\p{S}\s]+$/u',
            'title' => 'nullable|min:8|max:255|regex:/^[\p{L}\p{N}\p{P}\p{S}\s]+$/u',
        ]);

        return response()->json();
    }
}
