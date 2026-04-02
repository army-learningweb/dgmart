<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

use function Pest\Laravel\session;

abstract class Controller
{
    function __construct(Request $request)
    {
        // $request->session()->forget('post-file');
        // $request->session()->forget('post-file-id');
        $request->session()->put('module_active', $request->segment(2));
        $request->session()->put('sub_module_active', $request->segment(3));
    }
}
