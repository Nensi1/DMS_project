<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockNr extends Model
{
    protected $fillable = [
        'number','year' ];
        public $timestamps = false;

}
