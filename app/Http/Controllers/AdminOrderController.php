<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\order_item;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // danh sách
    function list(Request $request){
        $orders = Order::query()
        ->when($request->input('filter'),function($query,$value){
            $query->where('status',$value);
        })
        ->latest()
        ->paginate(7)
        ->onEachSide(1);
        $total = Order::count();

        $pending = Order::where('status','pending')->count();
        $processing = Order::where('status','processing')->count();
        $delivered = Order::where('status','delivered')->count();
        $shipped = Order::where('status','shipped')->count();
        $canceled = Order::where('status','canceled')->count();
        $refund = Order::where('status','refund')->count();

        $revenue = Order::where('status','delivered')->sum('price');

        return view('admin.order.view',compact('orders','total','pending','processing','delivered','shipped','canceled','refund','revenue'));
    }

    // Lọc + tìm kiếm
    function list_filter(Request $request){
        $filter_value = $request->input('filter_value');
        $search_value = $request->input('search_value');

        $orders = Order::query()
            ->when($filter_value, function ($query, $value) {
                $query->where('status', $value);
            })
            ->when($search_value, function ($query, $value) {
                $query->where('name', 'like', '%' . $value . '%')->orWhere('tel','like','%'.$value.'%');
            })
            ->latest()
            ->paginate(7)
            ->onEachSide(1);

        $view = view('admin.order.partials.list', compact('orders'))->render();
        return response()->json($view);
    }

    // Cập nhật thông tin
    function edit(Request $request){
        $id = $request->id;
        $order = Order::find($id);
        
        $products = order_item::with('products')
        ->where('order_id',$id)
        ->get();
        
        $data = [
            'order' => $order,
            'products' => $products
        ];

        return response()->json($data);
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{N}\p{P}\s]+$/u',
            'tel' => [
                'required',
                'regex:/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/'
            ],
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $order = Order::find($id);
        $order->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'address' => $request->input('address'),
            'note' => $request->input('note'),
            'status' => $request->input('status'),
            'updated_at' => now()
        ]);

        return back()->with('status','Cập nhật thành công');
    }

    // Cập nhật nhanh trạng thái
    function updateStatus(Request $request){
        $status_value = $request->status_value;
        $id = $request->id;

        Order::where('id',$id)->update([
            'status' => $status_value,
            'updated_at' => now()
        ]);
        
        // Đơn hàng có trạng thái đang giao và chưa nhận hàng
        if($status_value == 'shipped'){
            $order_items = order_item::where('order_id',$id)->get();
            foreach($order_items as $item){
                if($item->is_received == 'no'){
                    $product_sold_num = Product::where('id',$item->product_id)->value('sold');
                    $product_quantity_num = Product::where('id',$item->product_id)->value('quantity');
                    Product::where('id',$item->product_id)->update([
                        'sold' => $product_sold_num += $item->quantity,
                        'quantity' => $product_quantity_num -= $item->quantity,
                    ]);
                }
            }
            order_item::where('order_id',$id)->update(['is_received' => 'yes']);
        }

        // Đơn hàng có trạng thái hoàn trả và đã nhận hàng rồi
        if($status_value == 'refund'){
            $order_items = order_item::where('order_id',$id)->get();
            foreach($order_items as $item){
                if($item->is_received == 'yes'){
                    $product_sold_num = Product::where('id',$item->product_id)->value('sold');
                    $product_quantity_num = Product::where('id',$item->product_id)->value('quantity');
                    Product::where('id',$item->product_id)->update([
                        'sold' => $product_sold_num -= $item->quantity,
                        'quantity' => $product_quantity_num += $item->quantity,
                    ]);
                }
            }
        }

        // Đơn hàng có trạng thái hủy đơn và hàng chưa nhận
        if($status_value == 'canceled'){
            $order_items = order_item::where('order_id',$id)->get();
            foreach($order_items as $item){
                if($item->is_received == 'yes'){
                    $product_sold_num = Product::where('id',$item->product_id)->value('sold');
                    $product_quantity_num = Product::where('id',$item->product_id)->value('quantity');
                    Product::where('id',$item->product_id)->update([
                        'sold' => $product_sold_num -= $item->quantity,
                        'quantity' => $product_quantity_num += $item->quantity,
                    ]);
                }
            }

            order_item::where('order_id',$id)->update(['is_received' => 'no']);
        }
        
        $pending = Order::where('status','pending')->count();
        $processing = Order::where('status','processing')->count();
        $delivered = Order::where('status','delivered')->count();
        $shipped = Order::where('status','shipped')->count();
        $canceled = Order::where('status','canceled')->count();
        $refund = Order::where('status','refund')->count();
        $revenue = num_format(Order::where('status','delivered')->sum('price'));
        $view = view('admin.order.partials.status',compact('status_value'))->render();

        $data = [
            'pending' => $pending,
            'processing' => $processing,
            'delivered' => $delivered,
            'shipped' => $shipped,
            'canceled' => $canceled,
            'refund' => $refund,
            'view' => $view,
            'revenue' => $revenue
        ];

        return response()->json($data);
    }

    // Chi tiết đơn hàng
    function details (Order $order){
        $order_items = order_item::with('products.medias')
        ->where('order_id',$order->id)
        ->get();

        return view('admin.order.details',compact('order','order_items'));
    }


}
