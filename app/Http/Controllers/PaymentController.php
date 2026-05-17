<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;
use App\Models\order_item;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    // Hiển thị trang
    function view(){

        $carts = Cart::content();
        return view('client.payment.view',compact('carts'));
    }

    // Tạo đơn hàng
    function create(Request $request){

        $request->validate([
            'name' => 'required|min:2|max:255|regex:/^[\p{L}\p{N}\p{P}\s]+$/u',
            'tel' => [
                'required',
                'regex:/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/'
            ],
            'email' => 'required|email',
            'address' => 'required',
            'note' => 'nullable|regex:/^[\p{L}\p{P}\p{N}\p{S}\s]+$/u'
        ]);

        $new_order = Order::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'tel' => $request->input('tel'),
            'note' => $request->input('note'),
            'payment_method' => $request->input('payment_method'),
            'code' => 'dgorder#'.Str::random(10),
            'quantity' => Cart::count(),
            'price' => (int)  Str::replace('.','',Cart::total()) 
        ]);

        foreach(Cart::content() as $item){
            order_item::create([
                'order_id' => $new_order->id,
                'product_id' => $item->id,
                'options' => $item->options->variants,
                'quantity' => $item->qty,
                'price' => $item->price * $item->qty
            ]);
        };

        $data = [
            'order_code' => $new_order->code,
            'name' => $request->input('name'),
            'cart' => Cart::content(),
            'address' => $request->input('address'),
            'tel' => $request->input('tel'),
            'total_price' => $new_order->price
        ];

        Mail::to($request->input('email'))->send(new OrderMail($data));

        Cookie::queue('name',$request->input('name'));
        Cookie::queue('email',$request->input('email'));
        Cookie::queue('tel',$request->input('tel'));
        Cookie::queue('address',$request->input('address'));
        
        Cart::destroy();
        
        if($request->payment_method == 'cod'){
            return redirect('/dat-hang-thanh-cong');
        }

        if($request->payment_method != 'cod'){
            $request->session()->put('order',$new_order);
            return redirect('/thanh-toan-online');
        }
    }

    // Phương thức thanh toán khác
    function onlinePayment(){
        return view('client.payment.orther-payment');
    }

    // Thanh toán thành công
    function success(){
        return view('client.payment.success');
    }
}
