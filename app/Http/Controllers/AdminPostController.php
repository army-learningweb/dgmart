<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    function view(){
        return view('admin.post.view');
    }
}
