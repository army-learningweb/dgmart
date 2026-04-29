<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // danh sách
    function view()
    {
        $posts = Post::with(['media' => function ($query) {
            $query->where('type', 'post')->select('object_id', 'url');
        }])
            ->with('user:id,name')
            ->where('status', 'publish')
            ->latest()
            ->paginate(12);
        $categories = Category::where('status', 'active')->where('type', 'post')->whereNot('id', 1)->where('parent_id', 0)->get();
        return view('client.post.view', compact('posts', 'categories'));
    }

    // Lọc
    function filter(Request $request)
    {
        $id = $request->id;
        if ($id == 'all') {
            $posts = Post::with(['media' => function ($query) {
                $query->where('type', 'post')->select('object_id', 'url');
            }])
                ->with('user:id,name')
                ->where('status', 'publish')
                ->latest()
                ->paginate(12);
        } else {
            $posts = Post::with(['media' => function ($query) {
                $query->where('type', 'post')->select('object_id', 'url');
            }])
                ->with('user:id,name')
                ->where('status', 'publish')
                ->where('category_id', $id)
                ->latest()
                ->paginate(12);
        }
        $view = view('client.post.partials.list', compact('posts'))->render();

        $data = [
            'id' => $id,
            'view' => $view
        ];
        return response()->json($data);
    }

    // chi tiết
    function details(string $slug)
    {
        $post_info = Post::with('media:url,object_id')
            ->with('user:id,name')
            ->where('status', 'publish')
            ->where('slug', 'bai-viet/' . $slug)
            ->first();

        $posts = Post::with(['media' => function ($query) {
            $query->where('type', 'post')->select('object_id', 'url');
        }])
            ->with('user:id,name')
            ->where('status', 'publish')
            ->whereNot('slug','bai-viet/'.$slug)
            ->limit(6)
            ->get();

        return view('client.post.details', compact('post_info','posts'));
    }
}
