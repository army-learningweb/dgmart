<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PageController extends Controller
{
    function view()
    {
        return view('client.page.view');
    }
}
