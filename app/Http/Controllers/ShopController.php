<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Client;
use App\CartLine;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;
use App\OrderLine;
use Auth;

class ShopController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {
        $products=Product::all();
        return view("/ecommerce",compact('products'));
    }
    public function cart()
    {
        $errors="";
        return view("/shop/cart",compact('errors'));
    }
    public function show(Product $product)
    {
    return view('shop/product-show', compact('product'));
    }

    public function checkout(Request $request){
        $total=request('total');
        return view('shop.checkout', compact('total'));
    }
    public function stripePayment(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET'));
       try{
           $charge=Charge::create([
            'amount' => request('total'),
            'currency' => 'usd',
            'description' => 'OSHEE purchase',
            'source' => request('stripeToken'),
            'receipt_email' => request('email'),
            'metadata' => [
                'order_id' => 2456,
            ]
        ]);
        $order=new Order();
        $client=Client::where('id', Auth::user()->id)->first();
        $order->client()->associate($client);
        $order->total=request('total');
        $order->status="Accepted"; //In Progress //Shipped // Completed //Cancelled
        $order->payment=$charge->id; 
        $order->payment_status='Paid'; 
        $order->save();
        $cartlines=CartLine::all();
        foreach($cartlines as $cartline){
            $orderline=new OrderLine;
            $order=Order::where('id', $order->id)->first();
            $orderline->order()->associate($order);
            $orderline->product_id=$cartline->product_id;
            $orderline->quantity=$cartline->quantity;
            $orderline->total=$cartline->total;
            $orderline->totalnoVAT=$cartline->total/1.2;
            $orderline->save();

            $product=Product::where('id', $orderline->product_id)->first();
            $product->quantity=$product->quantity-$orderline->quantity;
            $product->update();
        }
        foreach($cartlines as $cartline){
            $cartline->delete();
        }
            }
            catch(\Exceptin $e) 
            {
                return redirect()->route('checkout')->with('error', $e->getMessage());
            }

        //save client order to database here
        
        // return back()->with('success_message','Thank you! Your payment has been accepted');
        
        $products=Product::all();
        return view('ecommerce',compact('products'))->with('success_message','Thank you! Your payment has been accepted');

    }


}
