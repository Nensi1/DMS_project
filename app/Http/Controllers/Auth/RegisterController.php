<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Position;
use App\Employee;


class RegisterController extends Controller
{
       /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/home';


  // public function register(Request $request)
  // {
  //     $this->validator($request->all())->validate();

  //     event(new Registered($user = $this->create($request->all())));

  //    // $this->guard()->login($user);
  // //this commented to avoid register user being auto logged in

  //     return $this->registered($request, $user)
  //         ?: redirect($this->redirectPath());
  // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth','is_admin','is_manager');
    // }
        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'surname' => ['required', 'string', 'max:255', 'min:2'],
            'email' => ['required', 'string', 'max:255', 'min:2'],
            'phone' => ['required', 'string', 'max:255', 'min:2'],
            'passport' => ['required', 'string', 'max:255', 'min:10'],
            'position' => ['required', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
      //generate a password for the new users
      $pw = User::generatePassword();

       //add new user to database

       $user=User::create([
        'name' => $data['name'],
        'surname' => $data['surname'],
        'email' => $data['email'],
        'phone'  => $data['phone'],
        'passport' => $data['passport'],
        'password' => $pw,
    ]);
    $user->positions()->attach(Position::where('title', $data['position'])->first());
    return $user;


      //add new user to database
      //$emp = Employee::create(request(['name','surname', 'email','phone','passport', 'position']),$pw);LOOK HERE
    //   User::sendWelcomeEmail($user);
      // return view('/home');
    // dd($pw);
    // return Redirect::('password/reset');
    }
}
