<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderLine;
use App\Product;
class DispatcherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders=Order::all();
        $show=false;
        $count = Order::where('status','=','Accepted')->count();
        return view("/dispatcher/index",compact('orders','show','count'));
    }

    public function update(Order $order){
        request()->has('completed') ? $order->dispatcherComplete() : $order->dispatcherIncomplete();
        $orders=Order::all();
        $clear=0;
        $show=false;
        foreach($orders as $order)
        {
            if($order->status=="Accepted")
            {$clear++;}
        }
        if($clear==0){
        return view('/dispatcher/index',compact('orders','show'))->with('success_message','Thank you! You have completed your dispatches');
        }
        else
        return view("/dispatcher/index",compact('orders','show'));
    }
    public function show(Order $order){
        $orders=Order::all();
        $show=true;
        $orderlines=OrderLine::all();
        $products=Product::all();
        $count = Order::where('status','=','Accepted')->count();
        return view("/dispatcher/index",compact('orders','order','show','count','orderlines','products'));
    }
}
