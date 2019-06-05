<?php

namespace App\Http\Controllers;
use App\Order;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DeliveryDetails;
use App\User;
use App\OrderLine;
use App\Product;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $show=false;
        $userid=Auth::user()->id;
        $orders = Order::where('status','=','In Progress')->orWhere('shipped_id','=',$userid)->get();
        if ($orders->count())
        return view('/delivery/index',compact('orders','show'));
        else
        return view('/delivery/index',compact('orders','show'))->with('success_message','No orders yet');   
    }
    public function update(Order $order){
        $userid=Auth::user()->id;
        $show=false;
        $order=Order::where('id', $order->id)->first();
        $user=User::where('id', $userid)->first();
        $detail=new DeliveryDetails;
        $now3=Carbon::now()->format('M');
        $shipped=Carbon::now();
        $detail->order()->associate($order);
        $detail->user()->associate($user);
        $detail->month=$now3;
        $detail->shipped_at=$shipped;
        $detail->save();
        
        request()->has('completed') ? $order->shipping($userid) : $order->notshipping();
        $orders = Order::where('status','=','In Progress')->orWhere('shipped_id','=',$userid)->get();
        return view('/delivery/index',compact('orders','show'));
    }

    public function update2(Order $order){
        $userid=Auth::user()->id;
        $show=false;
        $order->completed();
        $order->payment_status=request('pym-status'); 
        $order->update();
        $detail=DeliveryDetails::where('order_id', $order->id)->first();
        $shipped=$detail->shipped_at;
        $completed=Carbon::now();
        $detail->completed_at=$completed;
        $detail->comment=request('comment');
        // $detail->update();
        $detail->duration($shipped,$completed);
        $detail->update();

        $orders = Order::where('status','=','In Progress')->orWhere('shipped_id','=',$userid)->get();
        if ($orders->count())
        return view('/delivery/index',compact('orders','show'));
        else
        return view('/delivery/index',compact('orders','show'))->with('success_message','Thank you! You have completed your orders');
    }
    public function show(Order $order){
        $userid=Auth::user()->id;
        $show=true;
        $orderlines=OrderLine::all();
        $products=Product::all();
        $orders = Order::where('status','=','In Progress')->orWhere('shipped_id','=',$userid)->get();
        return view("/delivery/index",compact('orders','order','orderlines','products','show'));
    }
    
    
    public function destroy(Order $order)
    {
        $show=false;
        $order->shipped_id=null;
        $order->update();
        $userid=Auth::user()->id;
        $orders = Order::where('status','=','In Progress')->orWhere('shipped_id','=',$userid)->get();
        return redirect('/delivery');
        // return view("/delivery/index",compact('orders','show'));
    }
}
