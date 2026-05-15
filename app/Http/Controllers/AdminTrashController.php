<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\File;

class AdminTrashController extends Controller
{
    // danh sách
    function list(){
        $trashs = Media::whereNull('object_id')->get();
        $total = Media::whereNull('object_id')->count();
        return view('admin.trash.view',compact('trashs','total'));
    }

    // Dọn file rác
    function destroy_all(){
        $path = Media::whereNull('object_id')->value('url');
        if(File::exists($path)){
            if(file_exists(public_path($path))) File::delete($path);
        }
        $ids = Media::whereNull('object_id')->pluck('id');
        
        Media::whereIn('id',$ids)->delete();
        return back()->with('status','Dọn dẹp thành công');
    }
}
