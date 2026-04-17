<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    function view(){
        $products = Product::with('medias:object_id,url,type,is_main')->where('status','active')->paginate(16);
        $products_categories = Category::with('childs:parent_id,name')->where('type','product')->where('status','active')->whereNot('id',2)->where('parent_id',0)->get(); 
        $total = Product::where('status','active')->count();
        return view('client.product.view',compact('products','total','products_categories'));
    }
}
