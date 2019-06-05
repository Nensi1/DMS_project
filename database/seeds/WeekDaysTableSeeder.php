<?php

use Illuminate\Database\Seeder;
use App\WeekDays;

class WeekDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monday = new WeekDays();
        $monday->day='Monday';
        $monday->save();

        $tuesday = new WeekDays();
        $tuesday->day='Tuesday';
        $tuesday->save();

        $wedn = new WeekDays();
        $wedn->day='Wednesday';
        $wedn->save();

        $thur = new WeekDays();
        $thur->day='Thursday';
        $thur->save();

        $fri = new WeekDays();
        $fri->day='Friday';
        $fri->save();

        $sat = new WeekDays();
        $sat->day='Saturday';
        $sat->save();
    }
}
