<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Position;
use App\Employee;
use App\Employees;
use App\User;
use App\Category;
use App\Client;
use App\Bonus;
use App\Score;
use Carbon\Carbon;
use App\Salary;
use Illuminate\Support\Facades\Input;


class EmployeesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   $show=false;
        $users=User::paginate(7);
        $bonuses=Bonus::all();
        $scores=Score::all();
        $now=Carbon::now()->format('M');
        return view("/employees/index-employee",compact('users','bonuses','scores','now','show'));
    }

    public function showPosition()
    {
        $positions= Position::all();
        return view('/employees/register-employee', compact('positions'));
    }
  
    public function create()
    {
        return view('/employees/register-employee');
    }

    public function edit(User $user)
    {
        $positions= Position::all();
        return view('/employees/edit-employee', compact('user','positions'));
    }

    public function show(User $user)
    {
    return view('employees/show-employee', compact('user'));
    }
    public function store()
    {
        //generate a password for the new users
        $pw = User::generatePassword();

        $validated= request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'surname' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'max:255', 'min:2'],
            'phone' => ['required', 'string', 'max:255', 'min:2'],
            'passport' => ['required', 'string', 'max:10', 'min:10'],
            'position' => ['required', 'max:255']
        ]);

       $user=User::create([
            'name' => request('name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'passport'=> request('passport'),
            'password' => $pw,
            'wage' => request('wage'),
 
        ]); 
        $user->positions()->attach(Position::where('title', request('position'))->first());
        $bonus=new Bonus;
        $bonus->user_id=$user->id;
        $bonus->total='0';
        $bonus->payment='0';
        $bonus->save();

        $score=new Score;
        $score->user()->associate($user);
        $score->clients_nr='0';
        $score->total='0';
        $score->save();

        return redirect('/user');
    }




    public function update(User $user)
    {

        $validated= request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'surname' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'max:255', 'min:2'],
            'phone' => ['required', 'string', 'max:255', 'min:2'],
            'passport' => ['required', 'string', 'max:10', 'min:10'],
        ]);

       $user->update(request(['name','surname','email','phone','passport','wage']));

        $user->positions()->sync(Position::where('title', request('position'))->first());
       return redirect('/user');
    }


    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user');
    }

    public function month()
    {
        $show=true;
        $users=User::paginate(7);
        $bonuses=Bonus::all();
        $scores=Score::all();
        $month=request('month');
        $salaries=Salary::all();

        return view("/employees/index-employee",compact('users','bonuses','scores','now','show','salaries','show','month'));
    }
    public function search(){
        $show=false;
        $bonuses=Bonus::all();
        $scores=Score::all();
        $search = Input::get ( 'search' );
        $users = User::where('name','LIKE','%'.$search.'%')->orWhere('email','LIKE','%'.$search.'%')->paginate(7);
        if(count($users) > 0)
            return view('employees/index-employee',compact('users','bonuses','scores','show'))->withQuery ( $search );
        else return view ('employees/index-employee',compact('users','bonuses','scores','show'))->with('failure_message','No Details found. Try to search again !');

    }
}

