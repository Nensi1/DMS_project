<?php

namespace App\Http\Controllers;

use App\User;
use App\Charts\SampleChart;
use App\Salary;
use App\DeliveryDetails;
use Illuminate\Http\Request;
use DB;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexChart()
    {
        if(request('type')=="Salary")
        {   
            $data = collect([]); // Could also be an array
            $salaries=Salary::where('month', request('month'))->get();
            $data2 = collect([]); // Could also be an array

            foreach($salaries as $sal)
            {
                $data->push($sal->user->name);
            }
            foreach($salaries as $sal)
            {
                $data2->push($sal->total);

            }

            $chart = new SampleChart;
            $chart->labels($data);
            $chart->dataset('Salary Total', 'bar', $data2)->backgroundColor('lightblue');
        }
        elseif(request('type')=="Bonus")
        {   
            $data = collect([]); // Could also be an array
            $salaries=Salary::where('month', request('month'))->get();
            $data2 = collect([]); // Could also be an array

            foreach($salaries as $sal)
            {
                $data->push($sal->user->name);
            }
            foreach($salaries as $sal)
            {
                $data2->push($sal->bonus);

            }

            $chart = new SampleChart;
            $chart->labels($data);
            $chart->dataset('Salary Total', 'bar', $data2)->backgroundColor('lightblue');
        }
        elseif(request('type')=="Score")
        {   
            $data = collect([]); // Could also be an array
            $salaries=Salary::where('month', request('month'))->get();
            $data2 = collect([]); // Could also be an array

            foreach($salaries as $sal)
            {
                $data->push($sal->user->name);
            }
            foreach($salaries as $sal)
            {
                $data2->push($sal->score);

            }

            $chart = new SampleChart;
            $chart->labels($data);
            $chart->dataset('Salary Total', 'bar', $data2)->backgroundColor('lightblue');
        }
        else{
            $data = collect([]); // Could also be an array

            // $details = DeliveryDetails::select(DB::raw('round(avg(timetaken))'))
            // ->groupBy('user_id')
            // ->get();

            $details = DeliveryDetails::selectRaw('AVG(timetaken) average')
            ->where('month', request('month'))
            ->groupBy('user_id')
            ->get();
    // dd($details);
            foreach($details as $det)
            {
                $data->push($det->average);
            }

            $users = collect([]); // Could also be an array
            $users =DeliveryDetails::groupBy('user_id')
            ->get();
            $data2 = collect([]); 
            foreach($users as $user)
            {
                $data2->push($user->user->name);
            }// Could also be an array

            $chart = new SampleChart;
            $chart->labels($data2);
            $chart->dataset('Average Delivery Time', 'bar', $data)->options([
                'color' => '#ff0000',
            ]);
        }
        return view('employees.performance-chart', ['chart' => $chart]);            

    }
    public function index()
    {
    return view('employees.performance');
    }


}
