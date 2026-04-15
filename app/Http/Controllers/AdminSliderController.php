<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminSliderController extends Controller
{
    // danh sách
    function list(){
        $sliders = Slider::with(['user:id,name','media:object_id,type,url'])->orderBy('order','asc')->get();
        $total = Slider::all()->count();
        $active = Slider::where('status','active')->count();
        $unactive = Slider::where('status','unactive')->count();
        return view('admin.slider.view', compact('sliders','total','active','unactive'));
    }

    // phân trang - Lọc - tìm kiếm
    function list_filter(Request $request)
    {
        $filter_value = $request->input('filter_value');
        $sliders = Slider::query()->with(['user:id,name', 'media:object_id,url'])
            ->when($filter_value, function ($query, $value) {
                $query->where('status', $value);
            })
            ->latest()->paginate(5);

            $view = view('admin.slider.partials.list', compact('sliders'))->render();
            return response()->json($view);
    }

    // Thêm
    function store(Request $request){
        $request->validate([
            'title' => 'nullable|max:255|regex:/^[\p{L}\p{N}\s\p{P}]+$/u',
            'desc' => 'nullable|max:255|regex:/^[\p{L}\p{N}\s\p{P}]+$/u',
            'order' => 'required|integer|between:1,10',
            'slider-file-id' => 'required'
        ]);

        $new_banner = Slider::create([
            'title' => trim($request->input('title')),
            'desc' => trim($request->input('desc')),
            'order' => $request->input('order'),
            'user_id' => Auth::user()->id,
            'redirect' => $request->input('redirect')
        ]);

        Media::where('id',$request->input('slider-file-id'))->where('type','slider')->update(['object_id'=> $new_banner->id]);

        session()->forget('slider-file');
        session()->forget('slider-file-id');
        session()->forget($request->input('destroy-session'));
        session()->forget("{$request->input('destroy-session')}-id");
        session()->forget('old-slider-file-img');
        session()->forget('old-slider-file-id');

        return back()->with('status','Tạo mới thành công');
    }

    // Cập nhật
    function edit(Request $request){
        $id = $request->id;
        $slider_info = Slider::find($id);
        $img = Media::where('object_id', $slider_info->id)->where('type','slider')->first();
        $data = [
            'slider_info' => $slider_info,
            'img_url' => asset($img->url),
            'old_slider_file_id' => $img->id
        ];
        return response()->json($data);
    }

    function update(Request $request){
        $old_slider_file_img = asset(Media::where('object_id', $request->input('id'))->where('type','slider')->value('url'));
        $old_slider_file_id = Media::where('object_id', $request->input('id'))->where('type','slider')->value('id');
        $request->session()->put('old-slider-file-img', $old_slider_file_img);
        $request->session()->put('old-slider-file-id', $old_slider_file_id);

        $request->validate([
            'title' => 'nullable|max:255|regex:/^[\p{L}\p{N}\s\p{P}]+$/u',
            'desc' => 'nullable|max:255|regex:/^[\p{L}\p{N}\s\p{P}]+$/u',
            'order' => 'required|integer|between:1,10',
            'old-slider-file-id' => 'required',
        ]);

        Slider::where('id', $request->input('id'))->update([
            'title' => trim($request->input('title')),
            'desc' => trim($request->input('desc')),
            'order' => $request->input('order'),
            'redirect' => $request->input('redirect')
        ]);

        if ($request->input('slider-file-id') != null) {
            $path = Media::where('object_id', $request->input('id'))->where('type','slider')->value('url');
            if (isset($path)) {
                if (file_exists(public_path($path))) File::delete($path);
            }
            Media::where('object_id', $request->input('id'))->where('type','slider')->delete();

            Media::where('id', $request->input('slider-file-id'))->where('type','slider')->update([
                'object_id' => $request->input('id')
            ]);
        }

        session()->forget('slider-file');
        session()->forget('slider-file-id');
        session()->forget($request->input('destroy-session'));
        session()->forget("{$request->input('destroy-session')}-id");
        session()->forget('old-slider-file-img');
        session()->forget('old-slider-file-id');

        return back()->with('status', 'Cập nhật thành công');
    }

    // Cập nhật trạng thái
    function updateStatus(Request $request)
    {
        $status_value = $request->status_value;
        $id = $request->id;

        Slider::where('id', $id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);

        $active = Slider::where('status', 'active')->count();
        $unactive = Slider::where('status', 'unactive')->count();
    
        $view = view('admin.slider.partials.status', compact('status_value'))->render();

        $data = [
            'active' => $active,
            'unactive' => $unactive,
            'view' => $view
        ];
        return response()->json($data);
    }

    // Cập nhật thứ tự
    function updateOrder(Request $request){
        $id = $request->id;
        $order_value = $request->order_value;

        Slider::where('id',$id)->update([
            'order' => $order_value
        ]);
    }

    // Hành động
    function action(Request $request){
        
        if (!$request->action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động');
        if (!$request->banners_id) return back()->withInput()->with('status_failed', 'Hành động thất bại, chưa chọn hình ảnh');

        if ($request->action == 'destroy') {
            $imgs_path = Media::whereIn('object_id', $request->banners_id)->where('type','slider')->pluck('url');
            foreach ($imgs_path as $path) {
                if (file_exists(public_path($path))) {
                    File::delete($path);
                }
            }
            Media::whereIn('object_id', $request->banners_id)->where('type','slider')->delete();
            $num_delete = Slider::destroy($request->banners_id);
            return back()->with('status',"Đã xóa $num_delete ảnh banner");
        }

        Slider::whereIn('id',$request->banners_id)->update(['status' => $request->action, 'updated_at' => now()]);
        return back()->with('status', 'Cập nhật thành công');
    }

    // Xóa
    function destroy(Slider $slider){
        $file_path = Media::where('object_id', $slider->id)->where('type','slider')->first();

        if ($file_path) {
            if (file_exists(public_path($file_path->url))) File::delete($file_path->url);
            Media::where('object_id', $slider->id)->where('type','slider')->delete();
        }

        $slider->delete();

        return back()->with('status', 'Xóa thành công');
    }
}
