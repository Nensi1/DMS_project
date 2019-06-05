<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Mail;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'salary_id','name', 'email', 'password', 'surname','phone','passport','position', 'wage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function generatePassword()
    {
      // Generate random string and encrypt it. 
      return bcrypt(str_random(35));
    }
    // public static function sendWelcomeEmail($user)
    // {
    //   // Generate a new reset password token
    //   $token = app('auth.password.broker')->createToken($user);
      
    //   // Send email
    //   Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
    //     $m->from('hello@appsite.com', 'Distribution System');
    //     $m->to($user->email, $user->name)->subject('Welcome to APP');
    //   });
    // }

     public function positions(){
        return $this->belongsToMany('App\Position', 'user_position', 'user_id', 'position_id');
    }

    // public function hasAnyPosition($positions){
    //     if (is_array($positions)){
    //         foreach($positions as $position) {
    //             if($this->hasPosition($position)){
    //                 return true;
    //             }
    //         }
    //     } else {
    //         if ($this->hasPosition($positions)){
    //             return true;
    //         }
    //     }
    //     return false;

    // }

    public function hasPosition($position)
    {
        if ($this->positions()->where('title',$position)->first()){
            return true;
        }
        return false;
    }

    public function hasAnyPosition($positions) {
        if (!is_array($positions)) {
            $positions = [$positions]; //instead of create another query, this will let you change query just in one place if needed in future
        }
        if ($this->positions()->whereIn('title', $positions)->first()) {
            return true;
        }
        return false;
    }

    public function event(){
        return $this->hasMany('App\Event');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function deliverydetails(){
        return $this->belongsTo('App\DeliveryDetails');
    }
    public function isUser(){
        return true;
    }
    
    public function bonus()
    {
        return $this->hasMany('App\Bonus');
    }
    public function salary()
    {
        return $this->hasMany('App\Salary');
    }
    public function score(){
        return $this->belongsTo('App\Score');
    }
    public function schedule(){
        return $this->hasMany('App\Schedule');
    }
    public function task() {
        return $this->hasMany('App\Task');
    }
}
