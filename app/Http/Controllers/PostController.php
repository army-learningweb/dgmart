<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function view()
    {
        $posts = Post::with('media:object_id,url,type')->with('user:id,name')->where('status', 'publish')->orderBy('created_at', 'desc')->paginate(8);
        $categories = Category::where('status', 'active')->where('type', 'post')->whereNot('id', 1)->where('parent_id', 0)->get();
        return view('client.post.view', compact('posts','categories'));
    }

    function filter(Request $request) {
        $id = $request->id;
        if($id == 'all'){
            $posts = Post::with('media:object_id,url,type')->with('user:id,name')->where('status', 'publish')->orderBy('created_at','desc')->paginate(8);
        }else{
            $posts = Post::with('media:object_id,url,type')->with('user:id,name')->where('status', 'publish')->where('category_id',$id)->orderBy('created_at','desc')->paginate(8);
        } 
        $view = view('client.post.partials.list',compact('posts'))->render();
        $data = [
            'id' => $id,
            'view'=> $view
        ];
        return response()->json($data);
    }
}
