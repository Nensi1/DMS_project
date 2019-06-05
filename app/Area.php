<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name'];
    public $timestamps = false;

    public function client() {
        return $this->hasMany('App\Client');
    }
    public function schedule() {
        return $this->hasMany('App\Schedule');
    }
    public function task() {
        return $this->hasMany('App\Task');
    }

}
