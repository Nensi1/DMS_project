<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\ClientResetPasswordNotification;
use App\Category;
use App\Area;

class Client extends Authenticatable
{
    use Notifiable;
    protected $guard='client';
    public static function generatePassword()
    {
      // Generate random string and encrypt it. 
      return bcrypt(str_random(35));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'nipt','phone','address', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ]; 

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPasswordNotification($token));
    }

    public function category()
    {
    return $this->belongsTo('App\Category');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
    public function isUser(){
        return false;
    }
    public function hasAnyPosition(){
        return true;
    }
    public function tasks(){
        return $this->hasMany('App\Task');
    }
}