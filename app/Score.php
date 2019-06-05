<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'user_id','clients_nr','total'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
