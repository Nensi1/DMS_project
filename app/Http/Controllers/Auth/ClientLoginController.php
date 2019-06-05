<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Client;
class ClientLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:client')->except('logout');
    }

    public function showLoginForm()
    { 
        return view('/clients/auth/client-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        //attempt to log the user in
        if (Auth::guard('client')->attempt(['email'=>$request->email, 'password'=> $request->password], $request->remember)){
           //if successfu;. redirect ot intended loc
            // return redirect()->intended(route('client.dashboard'));
            return redirect('/client');
        };
        //if unsucc redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));     
    }
    public function logout()
    {
        Auth::guard('client')->logout();
        return $this->loggedOut($request) ?: redirect('/client/login');
    } 
}
