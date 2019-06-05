<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Illuminate\Support\Facades\Input;


class SupplierController extends Controller
{
    function index()
    {
        $suppliers=Supplier::all();

        return view("supplier/index",compact('suppliers'));
    }
    

    function create()
    {
        return view('supplier/create');
    }

    function show(Supplier $supplier)
    {
        return view('supplier/show', compact('supplier'));
    }

    function store()
    {
        $validated= request()->validate([
            'name'=>['required','min:2'], 
        ]);

        Supplier::create($validated); 
        return redirect('/supplier');
    }


    function edit(Supplier $supplier)
    {
        return view('supplier/edit', compact('supplier'));
    }

    function update(Supplier $supplier)
    {
       $supplier->update(request(['name'])); 
       return redirect('/supplier');
    }

    function delete(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/supplier');
    }
    public function search(){
        $search = Input::get ( 'search' );
        $suppliers = Supplier::where('name','LIKE','%'.$search.'%')->get();
        if(count($suppliers) > 0)
            return view('supplier/index',compact('suppliers'))->withQuery ( $search );
        else return view ('supplier/index',compact('suppliers'))->with('failure_message','No Details found. Try to search again !');
        
    }
    
}
