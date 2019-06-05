<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderLine;
use App\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    public function index(){
        if(request()->has('payment_status'))
        {
            $orders=Order::orderBy('created_at', 'desc')->where('payment_status',request('payment_status'))->paginate(5)->appends('payment_status',request('payment_status'));
        }
        else{
            $orders=Order::orderBy('created_at', 'desc')->paginate(7);
        }
        return view('shop.orderhistory',compact('orders'));
    }
    
    public function destroy(Order $order)
    {
        $orders=OrderLine::where('order_id', $order->id)->get();
        foreach($orders as $orderline_found){
            $product=Product::where('id',$orderline_found->product_id)->first();
            $product->quantity=$product->quantity+$orderline_found->quantity;
            $product->update();
            $orderline_found->delete();
        }
        $order->delete();
        return redirect('/order');
    }
}
