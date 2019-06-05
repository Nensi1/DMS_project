<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id','weekdays_id','client_id','category_id','area_id','status','comment'
    ];
    public function client()
    {
    return $this->belongsTo('App\Client');
    }
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
    public function getClient($categ,$area){
        $clients=Client::where('category_id',$categ)->where('area_id',$area)->get();
        return $clients;
    }
    public function complete(){
        $this->status="Visited";
        $this->update();
    }
    public function incomplete(){
        $this->status="Not Visited";
        $this->update();
    }
}
