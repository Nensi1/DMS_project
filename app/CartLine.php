<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartLine extends Model
{
    protected $fillable = [
        'product_id','quantity','total'];
    public $timestamps = false;
    
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
