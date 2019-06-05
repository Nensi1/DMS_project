<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Stock;
use App\StockNr;
use Carbon\Carbon;




class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
        function update(Product $product)
      {  $numbers=StockNr::all();
        $products=Product::paginate(7);

        $now=Carbon::now()->format('Y');
        $product->quantity=$product->quantity+request('quantity');
        $product->update();
        $stock=new Stock;   
        $stock->product()->associate($product);
        $stock->quantity=request('quantity');
        $stock->year=$now;
        $stock->save();
        return redirect('/products')->with([
            'numbers' => $numbers,
        ]);    
    }

    public function updateNr(){
        $products=Product::paginate(7);

        $now=Carbon::now()->format('Y');
        $numbers=StockNr::all();
        if($numbers->count()>0)
        {
        foreach($numbers as $number)
        {
            if($number->year==$now)
            {
                $number->number=$number->number+1;
                $number->update();
            }
            else{
                $number->number='0';
                $number->update();
            }
        }
        }
        else{
            $new=new StockNr;
            $new->number='1';
            $new->year=$now;
            $new->save();
        }
        return redirect('/products')->with([
            'numbers' => $numbers,
        ]);
    }
}
