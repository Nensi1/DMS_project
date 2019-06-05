<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Position;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function show()
    {
        $user=Auth::user();
        return view('/employees/account',compact('user'));
    }

    public function edit()
    {
        $user=Auth::user();
        $poss= Position::all();
        return view('/employees/edit-account', compact('poss','user'));
    }

    public function update()
    {
        $user=Auth::user();

        $validated= request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'surname' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'max:255', 'min:2'],
            'phone' => ['required', 'string', 'max:255', 'min:2'],
            'passport' => ['required', 'string', 'max:10', 'min:10'],
            'password' => ['required', 'min:5'],
            'position' => ['required'],
        ]);

       $user->password = password_hash(request('password'), PASSWORD_DEFAULT);
       $user->update(request(['name','surname','email','phone','passport']));
       $user->positions()->sync(Position::where('title', request('position'))->first());
        return view('/employees/account',compact('user'));
    }

    public function destroy()
    {
        Auth::user()->delete();
        return redirect('/acc');
    }


}
