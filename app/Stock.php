<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id','total_stock','year'];

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
