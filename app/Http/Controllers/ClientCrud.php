<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\User;
use App\Category;
use App\Score;
use Carbon\Carbon;
use App\Salary;
use App\Client;
use Illuminate\Support\Facades\Input;
use App\Area;


class ClientCrud extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clients=Client::paginate(7);
        return view("/clients/index-client",compact('clients'));
 
    }
 
     public function showCategArea()
     {
         $category= Category::all();
         $areas= Area::all();
         return view('/clients/register-client', compact('category','areas'));
     }
     public function create()
     {
         return view('/clients/register-client');   
     }
 
     public function show(Client $client)
     {
         return view('clients.show-client', compact('client'));
     }
     
     public function store()
     {
         //generate a password for the new users
         $pw = Client::generatePassword();
 
         $validated= request()->validate([
             'nipt' => ['required', 'string', 'min:10'],
             'name' => ['required', 'string', 'max:50', 'min:2'],
             'email' => ['required', 'string','email', 'max:255', 'min:2'],
             'address' => ['required', 'string', 'max:150', 'min:2'],
             'phone' =>  ['required', 'max:10'],
             'area' =>  ['required', 'string', 'max:50'],
             'city' =>  ['required', 'string', 'max:50'],
         ]);

        if(request('area')==='Other')
        { 
            $area = new Area();
            $area->name = request('area-txt');
            $area->save();
        }
        else
        {
            $area=Area::where('name', request('area'))->first();
        }

        $category=Category::where('name', request('category'))->first();

        $client = new Client();
        $client->nipt=request('nipt');
        $client->name=request('name');
        $client->email=request('email');
        $client->phone=request('phone');
        $client->address=request('address');
        $client->city=request('city');
        $client->password=$pw; 

        $client->category()->associate($category);
        $client->area()->associate($area);
        $client->save();

        //employee gets score for each client registered
        $userid=Auth::user()->id;
        $scores=Score::where('id','=',$userid)->count();
        if($scores)
        {
            $score_found=Score::where('id','=',$userid)->first();
            $score_found->clients_nr=$score_found->clients_nr+1;
            $score_found->total=500*$score_found->clients_nr;
            $score_found->update();

        }
        else{
            $score=new Score();
            $score->user()->associate(Auth::user());
            $score->clients_nr=$score->clients_nr+1;
            $score->total=500*$score->clients_nr;
            $score->save();
        }
         return redirect('/user/clients/list');
     }
 
     public function edit(Client $client)
     {
        $areas= Area::all();
        $category=Category::all();
        return view('/clients/edit-client', compact('client','areas','category'));
     }
 
     public function update(Client $client)
     {
        $validated= request()->validate([
            'nipt' => ['required', 'string', 'min:10'],
            'name' => ['required', 'string', 'max:50', 'min:2'],
            'email' => ['required', 'string','email', 'max:255', 'min:2'],
            'address' => ['required', 'string', 'max:150', 'min:2'],
            'phone' =>  ['required', 'min:10','max:10'],
            'area' =>  ['required', 'string', 'max:50'],
            'city' =>  ['required', 'string', 'max:50'],
        ]);

       if(request('area')==='Other')
       { 
           $area = new Area();
           $area->name = request('area-txt');
           $area->save();
       }
       else
       {
           $area=Area::where('name', request('area'))->first();
       }

       $category=Category::where('name', request('category'))->first();

       $client->nipt=request('nipt');
       $client->name=request('name');
       $client->email=request('email');
       $client->phone=request('phone');
       $client->address=request('address');
       $client->city=request('city');

       $client->category()->associate($category);
       $client->area()->associate($area);
       $client->update();
        return redirect('/user/clients/list');
     }
 
     public function delete(Client $client)
     {
         $client->delete();
         return redirect('/user/clients/list');
     }
    
        // $query = $request->search;
        // $clients = Client::all();    
    
        // $clients = $clients->where('name', 'LIKE',"%$query%");
        // $clients->get();
    
        // return view("/clients/index-client",compact('clients'));
    
    public function search(){
        $search = Input::get ( 'search' );
        $clients = Client::where('name','LIKE','%'.$search.'%')->orWhere('email','LIKE','%'.$search.'%')->paginate(7);
        if(count($clients) > 0)
            return view('clients/index-client',compact('clients'))->withQuery ( $search );
        else return view ('clients/index-client',compact('clients'))->with('failure_message','No Details found. Try to search again !');

    }
}
