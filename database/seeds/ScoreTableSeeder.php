<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Score;
class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= User::all();
        foreach($users as $user)
        {
            $score=new Score;
            $score->user()->associate($user);
            $score->clients_nr='0';
            $score->total='0';
            $score->save();
        }
    }
}
