<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Event extends Model
{
    protected $fillable = [
        'id', 'user_id', 'area_id','category_id','repeats','freq','freq_term','start_date','end_date','allDay','status','notes'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
  
}
