<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Intervention\Image\Colors\Rgb\Channels\Red;

class ProductController extends Controller
{
    // tất cả sản phẩm
    function view(){
        $products = Product::with('medias:object_id,url,type,is_main')->where('status','active')->paginate(16);
        $products_categories = Category::with('childs:parent_id,name')->where('type','product')->where('status','active')->whereNot('id',2)->where('parent_id',0)->get(); 
        $total = Product::where('status','active')->count();
        $title = 'Tất cả sản phẩm';
        return view('client.product.view',compact('products','total','products_categories','title'));
    }

    // Sản phẩm theo danh mục
    function category_view(Request $request){
        $uri =  $request->segment(2);
        $slug = explode('.',$uri);
        $complete_slug = 'san-pham/'.$slug[0].'.html';
        $id = Category::where('slug',$complete_slug)->value('id');

        $categories = Category::with('products:category_id,name')->where('parent_id',$id)->where('type','product')->where('status','active')->get(['id','name','slug']);
        $categories_id = Category::where('parent_id',$id)->where('status','active')->pluck('id');
        
        $products = Product::whereIn('category_id',$categories_id)->where('status','active')->paginate(16);
        $total = Product::whereIn('category_id',$categories_id)->where('status','active')->count();
        
        $path = $request->path();
        $title = Category::where('slug',$path)->value('name');

        return view('client.product.category-view',compact('categories','products','title','total'));
    }

    // Sản phẩm theo loại
    function type_view(Request $request){
        $uri = $request->segments(3);
        $complete_slug = $uri[0].'/'.$uri[1].'/'.$uri[2];
        $id = Category::where('slug',$complete_slug)->value('id');
        $products = Product::where('category_id',$id)->where('status','active')->paginate(16);
        $total = Product::where('category_id',$id)->get()->count();

        $curren_category_slug = $uri[0].'/'.$uri[1].'.html';
        $current_category_id = Category::where('slug', $curren_category_slug)->value('id');
        $categories = Category::with('products:category_id,name')->where('parent_id',$current_category_id)->where('type','product')->where('status','active')->get(['id','name','slug']);

        $path = $request->path();
        $title = $categories->where('slug',$path)->value('name');
        $breadcrum_category = Category::where('slug',$curren_category_slug)->first(['name','slug']);
        
        return view('client.product.type-view',compact('products','total','categories','title','breadcrum_category'));
    }
}
