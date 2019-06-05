<?php

namespace App;
use App\Area;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'user_id','weekdays_id','area_id','category_id'
    ];
    public function category()
    {
    return $this->belongsTo('App\Category');
    }

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
    public function weekdays()
    {
        return $this->belongsTo('App\WeekDays');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getArea($area){
        $area=Area::where('id',$area);
        return $area;
    }
    public function getCategory($categ){
        $category=Category::where('id',$categ);
        return $category;
    }
}
