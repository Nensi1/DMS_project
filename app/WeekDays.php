<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekDays extends Model
{
    protected $fillable = [
        'day'];
    public $timestamps = false;
    
    public function schedule() {
        return $this->hasMany('App\Schedule');
    }
    public function task() {
        return $this->hasMany('App\Task');
    }

}
