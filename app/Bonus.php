<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $fillable = [
        'user_id','total','payment'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
