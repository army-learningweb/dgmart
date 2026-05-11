<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function create(Request $request){
        return $request->all();
    }
}
