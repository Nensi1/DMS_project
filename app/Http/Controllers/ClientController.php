<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\Employee;
use App\Employees;
use App\User;
use App\Category;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     return redirect('/shop');
    }

    public function show()
    {
        $client=Auth::client()->id;
        return view('/clients/user/account',compact('client'));
    }


    // function update()
    // {
    //     $client=Auth::client()->id;
    //     $validated= request()->validate([
    //         'nipt' => ['required', 'string', 'min:10'],
    //         'name' => ['required', 'string', 'max:50', 'min:2'],
    //         'email' => ['required', 'string','email', 'max:255', 'min:2'],
    //         'address' => ['required', 'string', 'max:150', 'min:2'],
    //         'category' => ['required', 'max:50', 'min:2'],
    //         'phone' =>  ['required', 'string', 'max:10'],
    //         'area' =>  ['required', 'string', 'max:50'],
    //         'city' =>  ['required', 'string', 'max:50'],
    //         'password' =>  ['required', 'string', 'max:50'],
    //     ]);


    //     $client->update(request(
    //         ['nip','name','email','address','category','phone','area','city',bcrypt('password')]
    //     )); 
    //     return redirect('/client/account');
    // }

    // function destroy()
    // {
    //     $client=Auth::client()->id;
    //     $client->delete();
    //     return redirect('/client/account');
    // }

    // public function showCategory()
    // {
    //     $categories= Category::all();
    //     return view('/clients/user/account', compact('categories'));
    // }

}

