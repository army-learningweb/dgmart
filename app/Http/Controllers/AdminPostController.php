<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;

class AdminPostController extends Controller
{
    // danh sách
    function list()
    {
        $parent_categories = Category::where('type', 'post')->where('status', 'active')->where('parent_id', 0)->whereNot('id',1)->get();
        $posts = Post::with(['user:id,name', 'media:object_id,type,url', 'category:id,name'])->latest()->paginate(5);
        $total = Post::all()->count();
        $publish = Post::where('status', 'publish')->count();
        $unpublish = Post::where('status', 'unpublish')->count();
        $draft = Post::where('status', 'draft')->count();
        return view('admin.post.view', compact('parent_categories', 'posts', 'total', 'publish', 'unpublish', 'draft'));
    }

    // phân trang - Lọc - tìm kiếm
    function list_filter(Request $request)
    {
        $filter_value = $request->input('filter_value');
        $search_value = $request->input('search_value');
        $category_value = $request->input('category_value');

        $posts = Post::query()->with(['user:id,name', 'media:object_id,url', 'category:id,name'])
            ->when($filter_value, function ($query, $value) {
                $query->where('status', $value);
            })
            ->when($search_value, function ($query, $value) {
                $query->where('title', 'like', '%' . $value . '%');
            })
            ->when($category_value, function ($query, $value) {
                $query->where('category_id', $value);
            })
            ->latest()->paginate(5);

            $view = view('admin.post.partials.list', compact('posts'))->render();
            return response()->json($view);
    }

    // thêm
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:8|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'desc' => 'required|min:2|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'post-file-id' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required'
        ]);

        $new_post = Post::create([
            'title' => trim($request->input('title')),
            'desc' => trim($request->input('desc')),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('slug')),
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id')
        ]);

        Media::where('id', $request->input('post-file-id'))->where('type','post')->update(['object_id' => $new_post->id]);

        session()->forget('post-file');
        session()->forget('post-file-id');
        session()->forget($request->input('destroy-session'));
        session()->forget("{$request->input('destroy-session')}-id");
        session()->forget('old-post-file-img');
        session()->forget('old-post-file-id');

        return back()->with('status', 'Tạo mới thành công');
    }

    // xóa
    function destroy(Post $post)
    {
        $file_path = Media::where('object_id', $post->id)->where('type','post')->first();

        if (isset($file_path->url)) {
            if (file_exists(public_path($file_path->url))) File::delete($file_path->url);
            Media::where('object_id', $post->id)->where('type','post')->delete();
        }

        $post->delete();

        return back()->with('status', 'Xóa thành công');
    }

    // Cập nhật
    function edit(Request $request)
    {
        $id = $request->id;
        $post_info = Post::find($id);
        $img = Media::where('object_id', $post_info->id)->where('type','post')->first();
        $data = [
            'post_info' => $post_info,
            'img_url' => asset($img->url),
            'old_post_file_id' => $img->id
        ];
        return response()->json($data);
    }

    function update(Request $request)
    {
        $old_post_file_img = asset(Media::where('object_id', $request->input('id'))->where('type','post')->value('url'));
        $old_post_file_id = Media::where('object_id', $request->input('id'))->where('type','post')->value('id');
        $request->session()->put('old-post-file-img', $old_post_file_img);
        $request->session()->put('old-post-file-id', $old_post_file_id);

        $request->validate([
            'title' => 'required|min:8|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'desc' => 'required|min:2|max:255|regex:/^[\p{P}\p{L}\p{S}\p{N}\s]+$/u',
            'old-post-file-id' => 'required',
            'slug' => 'required|unique:posts,slug,'.$request->input('id'),
            'category_id' => 'required'
        ]);

        $slug = Post::where('id',$request->input('id'))->value('slug');
        $slug = $request->input('slug') == $slug ? $request->input('slug') : Str::slug($request->input('slug'));

        Post::where('id', $request->input('id'))->update([
            'title' => trim($request->input('title')),
            'desc' => trim($request->input('desc')),
            'content' => $request->input('content'),
            'slug' => $slug,
            'category_id' => $request->input('category_id')
        ]);

        if ($request->input('post-file-id') != null) {
            $path = Media::where('object_id', $request->input('id'))->where('type','post')->value('url');
            if (isset($path)) {
                if (file_exists(public_path($path))) File::delete($path);
            }
            Media::where('object_id', $request->input('id'))->where('type','post')->delete();

            Media::where('id', $request->input('post-file-id'))->where('type','post')->update([
                'object_id' => $request->input('id')
            ]);
        }

        session()->forget('post-file');
        session()->forget('post-file-id');
        session()->forget($request->input('destroy-session'));
        session()->forget("{$request->input('destroy-session')}-id");
        session()->forget('old-post-file-img');
        session()->forget('old-post-file-id');

        return back()->with('status', 'Cập nhật thành công');
    }

    // hành động
    function action(Request $request)
    {
        if (!$request->action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động');
        if (!$request->posts_id) return back()->withInput()->with('status_failed', 'Hành động thất bại, chưa chọn bài viết');

        if ($request->action == 'destroy') {
            $imgs_path = Media::whereIn('object_id', $request->posts_id)->where('type','post')->pluck('url');
            foreach ($imgs_path as $path) {
                if (file_exists(public_path($path))) {
                    File::delete($path);
                }
            }
            Media::whereIn('object_id', $request->posts_id)->where('type','post')->delete();
            $num_delete = Post::destroy($request->posts_id);
            return back()->with('status',"Đã xóa $num_delete bài viết");
        }
        Post::whereIn('id',$request->posts_id)->update(['status' => $request->action, 'updated_at' => now()]);
        return back()->with('status', 'Hành động thành công');
    }

    // Cập nhật trạng thái
    function updateStatus(Request $request)
    {
        $status_value = $request->status_value;
        $id = $request->id;

        Post::where('id', $id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);

        $publish = Post::where('status', 'publish')->count();
        $unpublish = Post::where('status', 'unpublish')->count();
        $draft = Post::where('status', 'draft')->count();

        $view = view('admin.post.partials.status', compact('status_value'))->render();

        $data = [
            'publish' => $publish,
            'unpublish' => $publish,
            'draft' => $draft,
            'view' => $view
        ];
        return response()->json($data);
    }
}
