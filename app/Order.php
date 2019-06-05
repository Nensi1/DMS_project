<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 'client_id', 'status','payment','user_id','total','payment_status','discount'];

    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orderline(){
        return $this->hasMany('App\OrderLine');
    }
    public function deliverydetails(){
        return $this->belongsTo('App\DeliveryDetails');
    }


    public function dispatcherComplete(){
        $this->status="In Progress";
        $this->update();
    }
    public function dispatcherIncomplete()
    {
        $this->status="Accepted";
        $this->update();
    }
    public function shipping($id){
        $this->status="Shipping";
        $this->shipped_id=$id;
        $this->update();
    }
    public function notshipping(){
        $this->status="In Progress";
        $this->shipped_id=null;
        $this->update();
    }
    public function completed(){
        $this->status="Completed";
        $this->update();
    }
}
