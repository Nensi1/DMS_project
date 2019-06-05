<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Event;
use Calendar;
use App\Area;
use App\Category;
use App\User;


class EventController extends Controller
{

    // public function showCategArea()
    // {
    //     $category= Category::all();
    //     $areas= Area::all();
    //     return view('/calendar/display-calendar', compact('category','areas'));
    // }
    // function index()
    // {
    //     return view('events.index');
    // }
    
    // // public function index(){

    // //     $events= Event::all();
    // //     $event=[];
    // //     foreach($events as $row){
    // //         $enddate = $row->end_date." 24:00:00";
    // //         $event[] = Calendar::event(
    // //             $row->area,
    // //             true,
    // //             new \DateTime($row->start_date),
    // //             new \DateTime($row->end_date),
    // //             $row->id,
    // //             [
    // //                 'color' => $row->color,
    // //             ]
    // //         );
    // //     }
    // //     $calendar_details=Calendar::addEvents($event);
    // //     return view('calendar.display-calendar', compact('events','calendar_details') ); 
    // // }
    // /**
    //  * @param Request $request
    //  * @return $this|\Illuminate\Http\RedirectResponse
    //  */
    // function store(Request $request)
    // {
    //     $rules = [
    //         'title' => 'required|max:100',
    //         'start_date' => 'required'
    //     ];
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     Events::create($request->all());
    //     return redirect()->back()->with(['status' => 'Event has been created']);
    // }
    // /**
    //  * @param $id
    //  */
    // function edit($id)
    // {
    //     $event = Events::find($id);
    //     echo json_encode($event);
    // }
    // /**
    //  * @param Request $request
    //  * @param $id
    //  * @return $this|\Illuminate\Http\RedirectResponse
    //  */
    // function update(Request $request, $id)
    // {
    //     $rules = [
    //         'title' => 'required|max:100',
    //         'start' => 'required'
    //     ];
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         echo json_encode(['status' => 'error']);
    //     }
    //     $event = Events::findOrFail($id);
    //     if ($request->end_date == 'undefined')
    //         $request['end_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
    //     if($request->start_date == $request->end_date)
    //         $request['allDay']=1;
    //     $event->fill($request->all());
    //     $event->save();
    //     echo json_encode(['status' => 'Event has been update']);
    // }
    // function destroy($id)
    // {
    //     $event = Events::findOrFail($id);
    //     $event->delete();
    //     return redirect()->back()->with(['status' => 'Event deleted']);
    // }
    // /**
    //  * @param $facility
    //  * @param $asset
    //  * @return string
    //  */
    // function events()
    // {
    //     $events = Events::where('status', '!=', 'completed')->get();
    //     $items = array();
    //     foreach ($events as $event) {
    //         if ($event->repeats == 1) {
    //             //create multiple entries for repeating events
    //             //count days from start to end and repeat
    //             if ($event->freq_term == 'day') {
    //                 foreach ($this->getDailyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //             if ($event->freq_term == 'week') {
    //                 foreach ($this->getWeeklyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //             if ($event->freq_term == 'month') {
    //                 foreach ($this->getMonthlyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //             if ($event->freq_term == 'year') {
    //                 foreach ($this->getYearlyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //         } else {
    //             foreach ($this->getDayTask($event) as $s) {
    //                 array_push($items, $s);
    //             }
    //         }
    //     }
    //     return json_encode($items);
    // }
    // /**
    //  * @param $event
    //  * @param $start
    //  * @param $end
    //  * @return array
    //  */
    // function getEvent($event,$start,$end){
    //     return array(
    //         'id' => (int)$event->id,
    //         'title' => $event->title,
    //         'start' => $start->format('Y-m-d H:i:s'),
    //         'end' => $end->format('Y-m-d H:i:s'),
    //         'url' => $event->url,
    //         'allDay'=>$event->allDay,
    //         'description'=>$event->notes
    //     );
    // }
    // /**
    //  * single day task
    //  * @param $event
    //  * @return array
    //  */
    // function getDayTask($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $events[] =$this->getEvent($event,$start,$end);
    //     return $events;
    // }
    // /**
    //  * repeating tasks even (n) days. Note if you can even put 7 days to make them weekly.
    //  *
    //  * @param $event
    //  * @return array
    //  */
    // function getDailyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $days = $end->diffInDays($start);
    //     $events = array();
    //     $date = $start;
    //     for ($i = 1; $i <= $days + 1; $i++) {
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] = $this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addDays($event->freq);
    //     }
    //     return $events;
    // }
    // /**
    //  * Weekly events repeating every (n) weeks
    //  * @param $event
    //  * @return array
    //  */
    // function getWeeklyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $weeks = $end->diffInWeeks($start);
    //     $events = array();
    //     $date = $start;
    //     for ($i = 1; $i <= $weeks + 1; $i++) {
    //         //skip completed.
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] = $this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addWeeks($event->freq);
    //     }
    //     return $events;
    // }
    // /**
    //  * Monthly events repeating every (n) months
    //  * @param $event
    //  * @return array
    //  */
    // function getMonthlyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $months = $end->diffInWeeks($start);
    //     $events = array();
    //     $date = $start;
    //     //daily tasks
    //     for ($i = 1; $i <= $months + 1; $i++) {
    //         //skip completed.
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] = $this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addMonths($event->freq);
    //     }
    //     return $events;
    // }
    // /**
    //  * yearly repeating events repeats every (n) years
    //  *
    //  * @param $event
    //  * @return array
    //  */
    // function getYearlyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $years = $end->diffInYears($start);
    //     $events = array();
    //     $date = $start;
    //     //daily tasks
    //     for ($i = 1; $i <= $years + 1; $i++) {
    //         //skip completed.
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] =$this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addYears($event->freq);
    //     }
    //     return $events;
    // }


    // public function index(){

    //     $events= Event::all();
    //     $event=[];
    //     foreach($events as $row){
    //         $enddate = $row->end_date." 24:00:00";
    //         $event[] = Calendar::event(
    //             $row->area,
    //             true,
    //             new \DateTime($row->start_date),
    //             new \DateTime($row->end_date),
    //             $row->id,
    //             [
    //                 'color' => $row->color,
    //             ]
    //         );
    //     }
    //     $calendar_details=Calendar::addEvents($event);
    //     return view('calendar.display-calendar', compact('events','calendar_details') ); 
    // }
    // public function index(){
    // 	$events = Event::get();
    // 	$event_list = [];
    // 	foreach ($events as $key => $event) {
    // 		$event_list[] = Calendar::event(
    //             $event->event_name,
    //             true,
    //             new \DateTime($event->start_date),
    //             new \DateTime($event->end_date.' +1 day'),
    //             null,
    //             // Add color and link on event
    //             [
    //                 'color' => '#f05050',
    //                 'url' => 'pass here url and any route',
    //             ]
    //         );
    // 	}
    //     $calendar_details = Calendar::addEvents($event_list)  
    //     ->setOptions([ //set fullcalendar options
    //         'firstDay'=> 1,
    //          'editable'=> true,
    //          'navLinks'=> true,
    //          'selectable'  => true,
    //          'durationeditable' => true,
    //     ]);
    // }
    
                
        // $events = [];
        // $data = Event::all();
        // if($data->count()) {
        //     foreach ($data as $key => $value) {
        //         $events[] = Calendar::event(
        //             $value->title,
        //             true,
        //             new \DateTime($value->start_date),
        //             new \DateTime($value->end_date.' +1 day'),
        //             null,
        //             // Add color and link on event
	    //             [
	    //                 'color' => '#f05050',
	    //                 'url' => 'pass here url and any route',
	    //             ]
        //         );
        //     }
        // }
        // $calendar = Calendar::addEvents($events);
        // return view('calendar/fullcalendar', compact('calendar'));

        // dd($calendar_details);
    // }

    // public function addEvent(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'area' => 'required',
    //         'category' => 'required',
    //         'start_date' => 'required',
    //         'end_date' => 'required'
    //     ]); 

    //     if ($validator->fails()) {
    //     	\Session::flash('warnning','Please enter the valid details');
    //         return Redirect::to('/events')->withInput()->withErrors($validator);
    //     }

    //     $event = new Event;
    //     $event->area = $request['area'];
    //     $event->category = $request['category'];
    //     $event->start_date = $request['start_date'];
    //     $event->end_date = $request['end_date'];
    //     $event->save();

    //     \Session::flash('success','Event added successfully.');
    //     return Redirect::to('/events');
    // }
    
    // function index()
    // {
    //     return view('calendar.display-calendar');
    // }
    // /**
    //  * @param Request $request
    //  * @return $this|\Illuminate\Http\RedirectResponse
    //  */
    // function store(Request $request)
    // {
    //     $rules = [
    //         'emp_name' => 'required|max:100', 
    //         'category' => 'required|max:100',
    //         'start_date' => 'required'
    //     ];
    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     $category=Category::where('name', request('category'))->first();
    //     $area=Area::where('name', request('area'))->first();
    //    $user=User::where('name', request('emp_name'))->first();

    //    $event=new Event;
    //    $event->status=request('status');
    //    $event->repeats=request('repeats');
    //    $event->freq=request('freq');
    //    $event->freq_term=request('freq_term');
    //    $event->start_date=request('start_date');
    //    $event->end_date=request('end_date');
    //    $event->allDay=request('allDay');
    //    $event->url=request('url');
    //    $event->notes=request('notes');

    //    $event->user()->associate($user);
    //    $event->category()->associate($category);
    //    $event->area()->associate($area);

    //    $event->save();
    //    \Session::flash('success','Event added successfully.');
    //     return redirect()->back()->with(['status' => 'Task has been created']);
    // }
    // /**
    //  * @param $id
    //  */
    // function edit($id)
    // {
    //     $event = Events::find($id);
    //     echo json_encode($event);
    // }
    // /**
    //  * @param Request $request
    //  * @param $id
    //  * @return $this|\Illuminate\Http\RedirectResponse
    //  */
    // function update(Request $request, $id)
    // {
    //     $rules = [
    //         'emp_name' => 'required|max:100', 
    //         'category' => 'required|max:100',
    //         'start_date' => 'required'
    //     ];
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         echo json_encode(['status' => 'error']);
    //     }
    //     $event = Events::findOrFail($id);
    //     if ($request->end_date == 'undefined')
    //         $request['end_date'] = date('Y-m-d H:i:s', strtotime($request->start_date));
    //     if($request->start_date == $request->end_date)
    //         $request['allDay']=1;

    //     $category=Category::where('name', request('category'))->first();
    //     $area=Area::where('name', request('area'))->first();
    //    $user=User::where('name', request('emp_name'))->first();

    //    $event=new Event;
    //    $event->status=request('status');
    //    $event->repeats=request('repeats');
    //    $event->freq=request('freq');
    //    $event->freq_term=request('freq_term');
    //    $event->start_date=request('start_date');
    //    $event->end_date=request('end_date');
    //    $event->allDay=request('allDay');
    //    $event->url=request('url');
    //    $event->notes=request('notes');

    //    $event->user()->update($user);
    //    $event->category()->update($category);
    //    $event->area()->update($area);

    //     $event->update();
    //     echo json_encode(['status' => 'Task has been updated']);
    // }
    // function destroy($id)
    // {
    //     $event = Events::findOrFail($id);
    //     $event->delete();
    //     return redirect()->back()->with(['status' => 'Task deleted']);
    // }
    // /**
    //  * @param $facility
    //  * @param $asset
    //  * @return string
    //  */
    // function events()
    // {
    //     $events = Events::where('status', '!=', 'completed')->get();
    //     $items = array();
    //     foreach ($events as $event) {
    //         if ($event->repeats == 1) {
    //             //create multiple entries for repeating events
    //             //count days from start to end and repeat
    //             if ($event->freq_term == 'day') {
    //                 foreach ($this->getDailyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //             if ($event->freq_term == 'week') {
    //                 foreach ($this->getWeeklyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //             if ($event->freq_term == 'month') {
    //                 foreach ($this->getMonthlyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //             if ($event->freq_term == 'year') {
    //                 foreach ($this->getYearlyTasks($event) as $s) {
    //                     array_push($items, $s);
    //                 }
    //             }
    //         } else {
    //             foreach ($this->getDayTask($event) as $s) {
    //                 array_push($items, $s);
    //             }
    //         }
    //     }
    //     return json_encode($items);
    // }
    // /**
    //  * @param $event
    //  * @param $start
    //  * @param $end
    //  * @return array
    //  */

  

    // function getEvent($event,$start,$end){
    //     return array(
    //         'id' => (int)$event->id,
    //         'emp_name' => (User::find($event->user_id))->name,
    //         'start' => $start->format('Y-m-d H:i:s'),
    //         'end' => $end->format('Y-m-d H:i:s'),
    //         'url' => $event->url,
    //         'allDay'=>$event->allDay,
    //         'description'=>$event->notes
    //     );
    // }
    // /**
    //  * single day task
    //  * @param $event
    //  * @return array
    //  */
    // function getDayTask($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $events[] =$this->getEvent($event,$start,$end);
    //     return $events;
    // }
    // /**
    //  * repeating tasks even (n) days. Note if you can even put 7 days to make them weekly.
    //  *
    //  * @param $event
    //  * @return array
    //  */
    // function getDailyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $days = $end->diffInDays($start);
    //     $events = array();
    //     $date = $start;
    //     for ($i = 1; $i <= $days + 1; $i++) {
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] = $this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addDays($event->freq);
    //     }
    //     return $events;
    // }
    // /**
    //  * Weekly events repeating every (n) weeks
    //  * @param $event
    //  * @return array
    //  */
    // function getWeeklyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $weeks = $end->diffInWeeks($start);
    //     $events = array();
    //     $date = $start;
    //     for ($i = 1; $i <= $weeks + 1; $i++) {
    //         //skip completed.
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] = $this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addWeeks($event->freq);
    //     }
    //     return $events;
    // }
    // /**
    //  * Monthly events repeating every (n) months
    //  * @param $event
    //  * @return array
    //  */
    // function getMonthlyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $months = $end->diffInWeeks($start);
    //     $events = array();
    //     $date = $start;
    //     //daily tasks
    //     for ($i = 1; $i <= $months + 1; $i++) {
    //         //skip completed.
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] = $this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addMonths($event->freq);
    //     }
    //     return $events;
    // }
    // /**
    //  * yearly repeating events repeats every (n) years
    //  *
    //  * @param $event
    //  * @return array
    //  */
    // function getYearlyTasks($event)
    // {
    //     $end = Carbon::parse($event->end_date);
    //     $start = Carbon::parse($event->start_date);
    //     $years = $end->diffInYears($start);
    //     $events = array();
    //     $date = $start;
    //     //daily tasks
    //     for ($i = 1; $i <= $years + 1; $i++) {
    //         //skip completed.
    //         if ($event->status == 'completed')
    //             continue;
    //         $events[] =$this->getEvent($event,$date,$date);
    //         $date = Carbon::parse($date)->addYears($event->freq);
    //     }
    //     return $events;
    // }
} -->
