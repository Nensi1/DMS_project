<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'surname','phone','passport','position','password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public static function generatePassword()
    {
      // Generate random string and encrypt it. 
      return bcrypt(str_random(35));
    }
    public static function sendWelcomeEmail($employee)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($employee);
      
      // Send email
      Mail::send('emails.welcome', ['employee' => $employee, 'token' => $token], function ($m) use ($employee) {
        $m->from('hello@appsite.com', 'Distribution System');
        $m->to($employee->email, $employee->name)->subject('Welcome to APP');
      });
    }
}
