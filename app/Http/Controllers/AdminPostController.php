<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;

class AdminPostController extends Controller
{
    // danh sách
    function view()
    {
        $parent_categories = Category::where('type', 'post')->where('status', 'active')->where('parent_id', '>', 0)->get();
        $posts = Post::with(['user:id,name', 'media:object_id,url', 'category:id,name'])->get();
        return view('admin.post.view', compact('parent_categories', 'posts'));
    }

    // thêm
    function store(Request $request)
    {  
        $request->validate([
            'title' => 'required|min:8|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'desc' => 'required|min:2|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'category_id' => 'required|exists:categories,id',
        ]);

        $new_post = Post::create([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id
        ]);

        Media::where('id', $request->post_file_id)->update(['object_id' => $new_post->id]);
        session()->forget($request->session);
        session()->forget("{$request->session}_id");

        return back()->with('status', 'Tạo mới thành công');
    }

    // xóa
    function destroy(Post $post)
    {
        $file_path = Media::where('object_id', $post->id)->first();
        if (file_exists($file_path->url)) File::delete($file_path->url);
        Media::where('object_id', $post->id)->delete();
        $post->delete();

        return back()->with('status', 'Xóa thành công');
    }
}
