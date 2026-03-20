<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    function __construct(Request $request)
    {
        $request->session()->put('module_active', $request->segment(2));
        $request->session()->put('sub_module_active', $request->segment(3));
    }
}
