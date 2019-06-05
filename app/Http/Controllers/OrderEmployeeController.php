<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Client;
use App\Bonus;
use App\DeliveryDetails;
use App\User;
use Auth;
use App\UserCartLine;
use App\OrderLine;


class OrderEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $details=DeliveryDetails::all();
        if(Auth::user()->hasPosition('Admin') || Auth::user()->hasPosition('Manager') )
        {
        $orderlines=OrderLine::all();
        $products=Product::all();
        if(request()->has('payment_status'))
        {
            $orders=Order::orderBy('created_at', 'desc')->where('payment_status',request('payment_status'))->paginate(5)->appends('payment_status',request('payment_status'));
        }
        else{
            $orders=Order::orderBy('created_at', 'desc')->paginate(7); 
               }
            }
        else{
            $orderlines=OrderLine::all();
        $products=Product::all();
        if(request()->has('payment_status'))
        {
            $orders=Order::orderBy('created_at', 'desc')->where('payment_status',request('payment_status'))->where('user_id',Auth::user()->id)->paginate(5)->appends('payment_status',request('payment_status'));
        }
        else{
            $orders=Order::orderBy('created_at', 'desc')->where('user_id',Auth::user()->id)->paginate(7); 
               }

        }
        return view('shop.orderhistory-employee',compact('orders','orderlines','products','details'));
    }

 
    public function store(){
        $order=new Order();
        $user=User::where('id', Auth::user()->id)->first();
        $client=Client::where('name', request('client'))->first();
        $order->user()->associate($user);
        $order->client()->associate($client);
        $order->total=request('total');
        $order->status="Accepted"; //In Progress //Shipped // Completed //Cancelled
        $order->payment='CASH'; 
        $order->payment_status='Unpaid'; 
        $order->save();

        $bonus=Bonus::where('user_id', Auth::user()->id)->first();
        $bonus->total=$bonus->total+(int)request('total');
        $bonus->payment=number_format($bonus->total*0.015, 2, '.', ',');
        $bonus->update();
        
 
        $cartlines=UserCartLine::all();
        foreach($cartlines as $cartline){
            $orderline=new OrderLine;
            $order=Order::where('id', $order->id)->first();
            $orderline->order()->associate($order);
            $orderline->product_id=$cartline->product_id;
            $orderline->quantity=$cartline->quantity;

            $pr=Product::where('id', $orderline->product_id)->first();
            $pr->quantity=$pr->quantity-$orderline->quantity;
            $pr->update();

            $orderline->total=$cartline->total;
            $orderline->totalnoVAT=$cartline->total/1.2;
            $orderline->save();

        }
        foreach($cartlines as $cartline){
            $cartline->delete();
        }
        $products=Product::all();
        return view('ecommerce',compact('products'))->with('success_message','Thank you! Your order has been accepted');
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
        return redirect('/orders');
    }
}
