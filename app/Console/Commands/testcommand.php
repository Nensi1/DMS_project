<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Bonus;
use App\Score;
use Carbon\Carbon;
use App\Salary;

class testcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test_command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users= User::all();
        $scores=Score::all();
        $bonuses=Bonus::all();
        $now=Carbon::now()->format('M');
        // $now = json_decode( $now );
        // $date = new \DateTime( $now->date );
        // $month_name = $date->format( 'M' );
        foreach($users as $user)
        {
            $score=Score::where('user_id', $user->id)->first();
            $bonus=Bonus::where('user_id', $user->id)->first();

            $salary=new Salary;
            $salary->user()->associate($user);
            $salary->wage=$user->wage;
            $salary->score=$score->total;
            $salary->bonus=$bonus->payment;
            $salary->total=$salary->bonus+$salary->score+$salary->wage;
            $salary->month=$now;
            $salary->save();
            
            $score->clients_nr='0';
            $score->total='0';
            $score->update();

            $bonus->total='0';
            $bonus->payment='0';
            $bonus->update();
        }
    }
}
