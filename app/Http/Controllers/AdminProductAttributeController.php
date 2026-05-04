<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductAttributeController extends Controller
{
    // danh sách
    function list(){
        return view('admin.product.view-attr');
    }
}
