<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\CartLine;
use App\Http\Controllers\Redirect;

class CartLineController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    
    public function store(){
        $sum=0;
        $product=Product::where('id', request('product_id'))->first();
        $cartlines=CartLine::all();
    
        $validated= request()->validate([
            'quantity' => ['required', 'string', 'max:10'],
            'product_id'=>'required',
        ]);
        foreach ($cartlines as $productCart){
            if($productCart->product_id==request('product_id')){
                $sum++;
            
            }
        }
        if($sum>0)
        {
            $cart2=Cartline::where('product_id', request('product_id'))->first();
            $cart2->quantity=$cart2->quantity+(int)request('quantity');
            $cart2->total=$cart2->quantity*$product->sell_price;
            $cart2->update(); 
        }
        else{
            $cartline=new CartLine();
            $cartline->quantity=(int)request('quantity');
            $cartline->total=(int)request('quantity')*$product->sell_price;
            $cartline->product()->associate($product);
            $cartline->save();      
        }
        return redirect('/shop');
    }
    public function update(Cartline $cartline){
        $product=$cartline->product;
        $stock=$product->quantity;
        $validated= request()->validate([
            'quantity' => ['required', 'string', 'max:5'],
        ]);
        if((int)request('quantity')<=$stock){
        $cartline->quantity=(int)request('quantity');
        $cartline->total=(int)request('quantity')*$product->sell_price;
        $cartline->update();      
        return redirect('/cart');
        }
        else{
            $cartlines=CartLine::all();
            $sum=0;
            foreach ($cartlines as $cartline){
                $sum+=$cartline->total;
            }
            $errors="We currently don't have that much stock";
            return view("/shop/cart", compact('cartlines','sum','errors'));
        }
  
    }
    // public function addToCart(Request $request,$id){
    //     $product=Product::where('id', request('product_id'))->first();
    //     $oldCart=Session::has('cart') ? Session::get('cart') : null;
    //     $cart=new Cart($oldCart);
    //     $qty=(int)request('quantity');
    //     $pr=(int)request('product_id');
    //     $cart->add($product,$qty, $pr);

    //     $request->session()->put('cart',$cart);
    //     dd($request->session()->get('cart'));
    //     return redirect()->route('ecommerce');


    // }

    public function index(){
        $cartlines=CartLine::all();
        $sum=0;
        foreach ($cartlines as $cartline){
            $sum+=$cartline->total;
        }
        return view("/shop/cart",compact('cartlines','sum'));
    }

    public function destroy(CartLine $cartline)
    {
        $cartline->delete();
        return redirect('/cart');
    }
}
