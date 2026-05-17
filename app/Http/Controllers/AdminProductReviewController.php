<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminProductReviewController extends Controller
{
    // Danh sách
    function list()
    {
        $reviews = ProductReview::with('product')
            ->latest()
            ->paginate(4);

        $publish = ProductReview::where('status', 'publish')->count();
        $pending = ProductReview::where('status', 'pending')->count();
        $total = ProductReview::count();
        return view('admin.review.view', compact('reviews', 'publish', 'pending', 'total'));
    }

    // Lọc
    function list_filter(Request $request)
    {
        $filter_value = $request->input('filter_value');
        $search_value = $request->input('search_value');

        $reviews = ProductReview::query()->with(['product:id,name'])
            ->when($filter_value, function ($query, $value) {
                $query->where('status', $value);
            })
            ->when($search_value, function ($query, $value) {
                $query->where('comment', 'like', '%' . $value . '%');
            })
            ->latest()->paginate(4);

        $view = view('admin.review.partials.list', compact('reviews'))->render();
        return response()->json($view);
    }

    // xóa
    function destroy($id = '')
    {
        ProductReview::find($id)->delete();
        return back()->with('status', 'Xóa thành công');
    }

    // Hành động
    function action(Request $request)
    {

        if (!$request->action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động');
        if (!$request->review_ids) return back()->withInput()->with('status_failed', 'Hành động thất bại, chưa chọn đánh giá');

        ProductReview::whereIn('id', $request->input('review_ids'))->update([
            'status' => $request->input('action'),
            'updated_at' => now()
        ]);

        return back()->with('status', 'Cập nhật thành công');
    }

    // Cập nhật nhanh trạng thái
    function updateStatus(Request $request)
    {
        $status_value = $request->status_value;
        $id = $request->id;

        ProductReview::where('id', $id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);

        $publish = ProductReview::where('status', 'publish')->count();
        $pending = ProductReview::where('status', 'pending')->count();

        $view = view('admin.review.partials.status', compact('status_value'))->render();

        $data = [
            'publish' => $publish,
            'pending' => $pending,
            'view' => $view
        ];
        return response()->json($data);
    }
}
