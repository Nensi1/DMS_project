<?php

namespace App\Http\Controllers;
use App\Task;
use Auth;
use App\WeekDays;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasPosition('Sales Agent'))
        {
            $days=WeekDays::all();
            $tasks=Task::where('user_id',Auth::user()->id)->get();
            // dd($tasks);
            return view("/calendar/tasks-manager",compact('tasks','days'));
        }
        else
        {
            $days=WeekDays::all();
            $tasks=Task::all();
            // dd($tasks);

            return view("/calendar/tasks-manager",compact('tasks','days'));
        }   
    }

    public function sales()
    {
        $now=Carbon::now()->format('l, d F, Y');
        $compare=Carbon::now()->format('l');
        $day=WeekDays::where('day',$compare)->first();
        $tasks=Task::where('weekdays_id',$day->id)->get();
        
        $tasksC = Task::where('status','=','Not Visited')->where('weekdays_id',$day->id)->get();
        if ($tasksC->count())
        return view("/calendar/sales-schedule",compact('now','tasks'));
        else
        return view("/calendar/sales-schedule",compact('now','tasks'))->with('success_message','Thank you! You have completed your tasks for today');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('/task/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task)
    {
        request()->has('completed') ? $task->complete() : $task->incomplete();
        $now=Carbon::now()->format('l, d F, Y');
        $compare=Carbon::now()->format('l');
        $day=WeekDays::where('day',$compare)->first();
        $tasks=Task::where('weekdays_id',$day->id)->get();

        $tasksC = Task::where('status','=','Not Visited')->where('weekdays_id',$day->id)->get();
        if ($tasksC->count())
        return view("/calendar/sales-schedule",compact('now','tasks'));
        else
        return view("/calendar/sales-schedule",compact('now','tasks'))->with('success_message','Thank you! You have completed your tasks for today');
    }

    public function update2(Task $task)
    {
        $task->report=request('report'); 
        $task->update();
        $now=Carbon::now()->format('l, d F, Y');
        $compare=Carbon::now()->format('l');
        $day=WeekDays::where('day',$compare)->first();
        $tasks=Task::where('weekdays_id',$day->id)->get();

        $tasksC = Task::where('status','=','Not Visited')->where('weekdays_id',$day->id)->get();
        if ($tasksC->count())
        return view("/calendar/sales-schedule",compact('now','tasks'));
        else
        return view("/calendar/sales-schedule",compact('now','tasks'))->with('success_message','Thank you! You have completed your tasks for today');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks/list');
    }
}
