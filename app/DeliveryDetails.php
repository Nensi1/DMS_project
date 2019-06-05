<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryDetails extends Model
{
    protected $fillable = ['id', 'order_id', 'user_id','shipped_at','completed_at','timetaken','comment'];
    public $timestamps = false;

    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function duration($shipped,$completed)
    {
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $shipped);
        $form = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $completed);
        $diff_in_minutes = $to->diffInMinutes($form);
        $this->timetaken=$diff_in_minutes;
    }
}
