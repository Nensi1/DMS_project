<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $fillable = [
        'id', 'order_id', 'product_id','quantity','total'];
    public function order(){
        return $this->belongsTo('App\Order');
    }
}
