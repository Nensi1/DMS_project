<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Area;
use App\WeekDays;
use Auth;
use App\Client;
use App\Task;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users=User::all();
        $show=false;
        return view('calendar.list-schedule',compact('show','users'));   
    }
    public function show()
    {
        $user=User::where('name',request('user'))->first();
        $schedules=Schedule::where('user_id',$user->id)->get();
        $category= Category::all();
        $areas= Area::all();
        $days=WeekDays::all();
        $show=true;
        $users=User::all();
        return view('calendar.list-schedule',compact('show','user','days','schedules','areas','category','users'));   
    }
    
    public function create()
    {
        $category= Category::all();
        $areas= Area::all();
        $users=User::all();
        $days=WeekDays::all();
        $schedules=Schedule::all();
        return view('calendar.create-schedule',compact('users','areas','category','days','schedules'));   
    }
    public function store()
    {
        $days=WeekDays::all();

        // $validated= request()->validate([
        //     'user' => ['required', 'string'],
        //     'category' => ['required', 'string'],
        //     'area' => ['required', 'string'],
        // ]);
        
        $category = request('category');
        $area = request('area');

        $i=1;
        $user=User::where('name', request('user'))->first();
        $schedule=Schedule::where('user_id',$user->id);

        if($schedule->count()>0)
        {
            $scheduleF=$schedule->get();
            foreach( $scheduleF as $sched ) {            
            foreach( $area as $key => $n ) {
                $areareq=$n;
                $categreq=$category[$key];
        
                $categ_final=Category::where('name',$categreq)->first();
                $area_final=Area::where('name', $n)->first();
                
                // $sched=Schedule::where('weekdays_id',$i)->where('user_id',$user->id)->first()->findOrFail();
                if($sched->weekdays_id==$i)
                {
                $sched->user()->associate($user);
                $sched->category()->associate($categ_final);
                $sched->area()->associate($area_final);
                $sched->weekdays_id=$i;
                $sched->update();
                }
                }
                $i++;

            }
        }
        else{
            foreach( $area as $key => $n ) {
            $areareq=$n;
            $categreq=$category[$key];

            $categ_final=Category::where('name',$categreq)->first();
            $area_final=Area::where('name', $n)->first();

            $schedule1 = new Schedule();
            $schedule1->user()->associate($user);
            $schedule1->category()->associate($categ_final);
            $schedule1->area()->associate($area_final);
            $schedule1->weekdays_id=$i;
            $schedule1->save();
            $i++;
            }
        }
        $j=1;
        foreach( $area as $key => $n ) {
            $areareq=$n;
            $categreq=$category[$key];

            $categ_final=Category::where('name',$categreq)->first();
            $area_final=Area::where('name', $n)->first();

            $clients=Client::where('category_id',$categ_final->id)->where('area_id',$area_final->id)->get();
            foreach($clients as $client)
            {
                $task = new Task();
                $task->client()->associate($client);
                $task->user()->associate($user);
                $task->category()->associate($categ_final);
                $task->area()->associate($area_final);
                $task->weekdays_id=$j;
                $task->status='Not Visited';
                $task->save();
                $j++;
            }
        }
        return redirect('/schedule');

    }
    public function sales_show()
    {
        $user=Auth::user();
        $schedules=Schedule::where('user_id',$user->id)->get();
        $category= Category::all();
        $areas= Area::all();
        $days=WeekDays::all();
        $users=User::all();
        return view('calendar.sales-schedule',compact('user','days','schedules','areas','category','users'));
    }
}
