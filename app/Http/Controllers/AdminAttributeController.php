<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variant;
use App\Models\Attribute;
use App\Models\AttributeVariant;

class AdminAttributeController extends Controller
{
    // danh sách
    function list()
    {
        $variants = Variant::all()->groupBy('slug');
        $attrs = Attribute::all();
        return view('admin.product.view-attr', compact('variants', 'attrs'));
    }

    // thêm
    function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{S}\s\p{P}\p{N}]+$/u|unique:attributes',
            'desc' => 'required|min:2|regex:/^[\p{L}\p{P}\p{S}\p{N}\s]+$/u',
            'variants' => 'required'
        ]);

        $new_attr = Attribute::create([
            'name' => trim($request->input('name')),
            'desc' => trim($request->input('desc'))
        ]);

        $new_attr->variants()->sync($request->input('variants'));

        return back()->with('status', 'Tạo mới thành công');
    }

    // Hành động
    function action(Request $request)
    {
        if (!$request->action) return back()->withInput()->with('status_failed', 'Thất bại, bạn chưa chọn hành động');
        if (!$request->attrs) return back()->withInput()->with('status_failed', 'Hành động thất bại, chưa chọn cấu hình');

        $ids = $request->input('attrs');
        Attribute::whereIn('id', $ids)->delete();
        return back()->with('status', "Xóa thành công");
    }

    // xóa
    function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return back()->with('status', 'Xóa thành công');
    }

    // Cập nhật
    function edit(Request $request)
    {
        $id = $request->id;
        $attribute = Attribute::find($id);
        $variants = AttributeVariant::where('attribute_id',$id)->pluck('variant_id');

        $data = [
            'attribute' => $attribute,
            'variants' => $variants
        ];
        return response()->json($data);
    }

    function update(Request $request){
        $request->session()->put('attr_id',$request->id);

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{S}\s\p{P}\p{N}]+$/u|unique:attributes,name,'.$request->id,
            'desc' => 'required|min:2|regex:/^[\p{L}\p{P}\p{S}\p{N}\s]+$/u',
            'variants' => 'required'
        ]);

        $attribute = Attribute::find($request->id);

        $attribute->update([
            'name' => trim($request->input('name')),
            'desc' => trim($request->input('desc'))
        ]);

        $attribute->variants()->sync($request->input('variants'));

        return back()->with('status','Cập nhật thành công');
    }
}
