<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }
       // public function getCheckout(){
    //     $total=request('total');
    //     return view('shop.checkout', compact('total'));
    // }
    public function checkout(){
        $total=request('total');
        return view('shop.checkout', compact('total'));
    }
    public function stripe(){
        return view('shop.stripe');
    }
    public function stripePayment(Request $request){
        // $total=request('total');
        // return view('shop.checkout', compact('total'));
    }
}
