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
        // $request->session()->forget('post_file');
        // $request->session()->forget('post_file_id');
        $request->session()->put('module_active', $request->segment(2));
        $request->session()->put('sub_module_active', $request->segment(3));

        $trash_file = Media::whereNull('object_id')->where('created_at', '<', now()->subMinute(30))->get();

        if ($trash_file->count() > 0) {
            foreach ($trash_file as $file) {
                if (file_exists($file->url)) {
                    File::delete($file->url);
                }
            }

            if ($request->session()->get('module_active') == 'posts') {
                $request->session()->forget('post_file');
                $request->session()->forget('post_file_id');
            }
        }

        Media::whereNull('object_id')->where('created_at', '<', now()->subMinute(30))->delete();
    }
}
