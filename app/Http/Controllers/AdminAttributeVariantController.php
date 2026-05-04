<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeVariant;

class AdminAttributeVariantController extends Controller
{
    // danh sách
    function list()
    {
        $variants = AttributeVariant::all()->groupBy('slug');
        $total = AttributeVariant::count();
        return view('admin.product.view-variant', compact('variants','total'));
    }
    // thêm mới
    function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{S}\s\p{P}\p{N}]+$/u|unique:attribute_variants',
            'slug' => 'required|min:2|max:255|regex:/^[a-zA-Z0-9\-\.\s]+$/',
            'desc' => 'required|min:2|regex:/^[\p{L}\p{P}\p{S}\p{N}\s]+$/u',
            'price' => 'required|integer|between:1,1000000000'
        ]);

        AttributeVariant::create([
            'name' => trim($request->input('name')),
            'slug' => trim($request->input('slug')),
            'desc' => trim($request->input('desc')),
            'price' => $request->input('price')
        ]);

        return back()->with('status', 'Tạo mới thành công');
    }

    // Cập nhật
    function edit(Request $request)
    {
        $id = $request->id;
        $varient = AttributeVariant::find($id);
        return response()->json($varient);
    }

    function update(Request $request)
    {
        $request->session()->put('variant_id',$request->id);

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{S}\s\p{P}\p{N}]+$/u|unique:attribute_variants,name,' . $request->id,
            'slug' => 'required|min:2|max:255|regex:/^[a-zA-Z0-9\-\.\s]+$/',
            'desc' => 'required|min:2|regex:/^[\p{L}\p{P}\p{S}\p{N}\s]+$/u',
            'price' => 'required|integer|between:1,1000000000'
        ]);

        AttributeVariant::where('id', $request->id)->update([
            'name' => trim($request->input('name')),
            'slug' => trim($request->input('slug')),
            'desc' => trim($request->input('desc')),
            'price' => $request->input('price')
        ]);

        $request->session()->forget('variant_id');
        return back()->with('status', 'Cập nhật thành công');
    }

    // Lọc
    function list_filter(Request $request){
        $filter_value = $request->filter_value;
        $variants = AttributeVariant::where('slug',$filter_value)->get()->groupBy('slug');
        $view = view('admin.product.partials.list-variant',compact('variants'))->render();
        return response()->json($view);
    }

    // xóa
    function destroy(AttributeVariant $variant){
        $variant->delete();
        return back()->with('status','Xóa thành công');
    }

    // Hành động
    function action(Request $request){

    if (!$request->action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động');
    if (!$request->variant_ids) return back()->withInput()->with('status_failed', 'Hành động thất bại, chưa chọn thông số');

    $ids = $request->input('variant_ids');
    return $ids;

    }
}
