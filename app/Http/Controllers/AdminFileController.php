<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminFileController extends Controller
{
    // thêm
    function upload(Request $request)
    {

        if ($request->hasFile('file')) {

            $request->validate([
                'file' => 'image|mimes:jpg,jpeg,png,avif|max:2048'
            ]);
            $file = $request->file('file');

            $size = $file->getSize();
            $name = Str::slug(pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME));
            $extension = $file->getClientOriginalExtension();
            $type = $request->input('type');

            $file_name = "$name.$extension";
            $save_path = "uploads/{$type}";

            $i = 1;
            while(File::exists("$save_path/$file_name")){
                $file_name = "{$name}-copy-{$i}.{$extension}";
                $i++;
            }

            $file->move("uploads/{$type}",$file_name);

            $new_img = Media::create([
                'url' => "{$save_path}/{$file_name}",
                'name' => $name,
                'extension' => $extension,
                'size' => $size,
                'type' => $type,
                'user_id' => Auth::user()->id
            ]);

            $request->session()->put($request->name,asset($save_path . "/" . $file_name));
            $request->session()->put("{$request->name}_id",$new_img->id);
            
            $data = [
                'id' => $new_img->id,
                'url' => asset($save_path . "/" . $file_name)
            ];
        }

        return response()->json($data);
    }

    // xóa
    function remove(Request $request){
        $id = $request->id;
        $name = $request->name;

        $path = Media::find($id)->pluck('url')[0];
        File::delete($path);
        Media::find($id)->delete();

        session()->forget($request->name);
        session()->forget("{$request->name}_id");
    }
}
