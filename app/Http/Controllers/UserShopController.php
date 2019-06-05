<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\UserCartLine;
use App\Order;
use App\OrderLine;
use Auth;
use App\Client;
use App\User;

class UserShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=true;
        $products=Product::all();
        return view("ecommerce",compact('products','user'));
    }
    public function cart()
    {
        $errors="";
        $cartlines=UserCartLine::all();
        $clients=Client::all();
        $sum=0;
        foreach ($cartlines as $cartline){
            $sum+=$cartline->total;
        }
        return view("/shop/cart", compact('cartlines', 'sum','errors','clients'));
    }

    public function store(){
        $sum=0;
        $product=Product::where('id', request('product_id'))->first();
        $cartlines=UserCartLine::all();
    
        $validated= request()->validate([
            'quantity' => ['required', 'string', 'max:5'],
            'product_id'=>'required',
        ]);
        foreach ($cartlines as $productCart){
            if($productCart->product_id==request('product_id')){
                $sum++;
            
            }
        }
        if($sum>0)
        {
            $cart2=UserCartline::where('product_id', request('product_id'))->first();
            $cart2->quantity=$cart2->quantity+(int)request('quantity');
            $cart2->total=$cart2->quantity*$product->sell_price;
            $cart2->update(); 
        }
        else{
            $cartline=new UserCartLine();
            $cartline->quantity=(int)request('quantity');
            $cartline->total=(int)request('quantity')*$product->sell_price;
            $cartline->product()->associate($product);
            $cartline->save();      
        }
        return redirect('user/shop/list');
    }
    public function update(UserCartline $cartline){
        $product=$cartline->product;
        $stock=$product->quantity;
        $validated= request()->validate([
            'quantity' => ['required', 'string', 'max:5'],
        ]);
        if((int)request('quantity')<=$stock){
        $cartline->quantity=(int)request('quantity');
        $cartline->total=(int)request('quantity')*$product->sell_price;
        $cartline->update();      
        return redirect('/empcart');
        }
        else{   
            $cartlines=UserCartLine::all();
            $sum=0;
            foreach ($cartlines as $cartline){
                $sum+=$cartline->total;
            }
            $errors="We currently don't have that much stock";
            return view("/shop/cart", compact('cartlines','sum','errors'));
            // return back()->with('errors',"We currently don't have that much stock");
        }
    }

    public function destroy(UserCartLine $cartline)
    {
        $cartline->delete();
        return redirect('/empcart');
    }


    public function autocomplete(Request $request)
    {
        $data = Client::select("name as name")->where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
    public function show(Product $product)
    {
    return view('shop/product-show', compact('product'));
    }
    
}
