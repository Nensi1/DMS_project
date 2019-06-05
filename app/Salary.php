<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'bonus','total'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
