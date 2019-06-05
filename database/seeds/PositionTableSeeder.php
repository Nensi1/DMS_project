<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position_admin= new Position();
        $position_admin->title='Admin';
        $position_admin->save();

        $position_manager= new Position();
        $position_manager->title='Manager';
        $position_manager->save();

        $position_sales= new Position();
        $position_sales->title='Sales Agent';
        $position_sales->save();

        $position_disp= new Position();
        $position_disp->title='Order Dispatcher';
        $position_disp->save();

        $position_inv= new Position();
        $position_inv->title='Inventory Supervisor';
        $position_inv->save();

        $position_deliver= new Position();
        $position_deliver->title='Delivery';
        $position_deliver->save();



    }
}
