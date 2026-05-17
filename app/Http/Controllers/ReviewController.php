<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductReview;

class ReviewController extends Controller
{
    function storeProductReview(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:50|regex:/^[\p{L}\p{P}\s]+$/u',
            'job' => 'required|min:2|max:100|regex:/^[\p{L}\p{P}\p{N}\s]+$/u',
            'comment' => 'required|min:2|max:350|regex:/^[\p{L}\p{P}\p{S}\p{N}\s]+$/u',
            'vote' => 'required'
        ]);

        ProductReview::create([
            'product_id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'job' => $request->input('job'),
            'comment' => $request->input('comment'),
            'vote' => $request->input('vote')
        ]);

        $product = Product::find($request->input('product_id'));
        $product->update([
            'vote' => $product->vote += 1
        ]);

        return back()->with('status','Gửi đánh giá thành công');
    }
}
