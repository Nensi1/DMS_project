<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasPosition('Order Dispatcher'))
        return redirect('/dispatcher');
        elseif(Auth::user()->hasPosition('Sales Agent'))
        return redirect('/tasks/todo');
        elseif(Auth::user()->hasPosition('Delivery'))
        return redirect('/delivery');
        elseif(Auth::user()->hasPosition('Manager') || Auth::user()->hasPosition('Admin'))
        return redirect('/orders');
        elseif(Auth::user()->hasPosition('Inventory Supervisor'))
        return redirect('/products');
        else
        return view('home');
    }
}
