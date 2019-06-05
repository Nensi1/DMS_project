<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;
class Product extends Model
{
    protected $fillable = ['barcode','name', 'product_image','quantity','category', 'price','description'];

    public function getImageAttribute()
    {
        return $this->product_image;
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
    public function product_category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function cartline(){
        return $this->belongsTo('App\CartLine');
    }
    public function usercartline(){
        return $this->belongsTo('App\UserCartLine');
    }

    public function stock(){
        return $this->hasMany('App\Stock');
    }

}
