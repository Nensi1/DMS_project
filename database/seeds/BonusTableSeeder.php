<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Bonus;

class BonusTableSeeder extends Seeder
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
            $bonus=new Bonus;
            $bonus->user_id=$user->id;
            $bonus->total='0';
            $bonus->payment='0';
            $bonus->save();
        }
    }
}
