<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cost;
use Illuminate\Support\Facades\Input;


class CostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $show=false;
        $costs=Cost::all();
        $totalH=0;
        $totalC=0;
        foreach($costs as $cost)
        {
            if($cost->category=="Holding Cost")
            $totalH+=$cost->amount;
            elseif ($cost->category=="Ordering Cost")
            $totalC+=$cost->amount;
        }
        return view("/inventory/cost",compact('costs','totalH','totalC','show'));
 
    }

    public function search(){
        $eoq='';
        $search = Input::get ( 'search' );
        $costs = Cost::where('name','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->get();
        if(count($costs) > 0)
            return view('inventory/cost',compact('costs','eoq'))->withQuery ( $search );
        else return view ('inventory/cost',compact('costs','eoq'))->with('failure_message','No Details found. Try to search again !');
    }
    public function update(Cost $cost){
        $eoq='';
        $cost->amount=request('amount');
        $cost->update();
        $costs=Cost::all();
        return redirect('cost');
    }
    public function updateRepeat(Cost $cost){
        $eoq='';
        $cost->repeat=request('repeat');
        $cost->update();
        $costs=Cost::all();
        return redirect('/cost');
    }
    public function store(){
        $eoq='';
        $validated= request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'amount' => ['required', 'string', 'max:255', 'min:2'],
            'category' => ['required', 'string', 'max:255', 'min:2'],
        ]);
        $cost=Cost::create([
            'name' => request('name'),
            'amount' => request('amount'),
            'category' => request('category'),
        ]); 
        $costs=Cost::all();
        return view("/inventory/cost",compact('costs','eoq'));    
    }
    public function destroy(Cost $cost)
    {
        $cost->delete();
        return redirect('/cost');
    }
}
