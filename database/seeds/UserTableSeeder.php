<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Position;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position_admin = Position::where('title','Admin')->first();
        $position_manager = Position::where('title','Manager')->first();
        $position_sales = Position::where('title','Sales Agent')->first();
        $position_disp = Position::where('title','Order Dispatcher')->first();
        $position_inv = Position::where('title','Inventory Supervisor')->first();
        $position_deliv = Position::where('title','Delivery')->first();

 

        $admin = new User();
        $admin->name='Meri';
        $admin->surname='Shehu';
        $admin->email='merishehu@gmail.com';
        $admin->phone='0698844653';
        $admin->passport='JB0452813B';
        $admin->password=bcrypt('admin');
        $admin->wage='60000';
        $admin->save();
        $admin->positions()->attach($position_admin);

        $manager = new User();
        $manager->name='Geri';
        $manager->surname='Kami';
        $manager->email='gerikami@gmail.com';
        $manager->phone='0692444623';
        $manager->passport='JB0452234B';
        $manager->wage='50000';
        $manager->password=bcrypt('manager');
        $manager->save();
        $manager->positions()->attach($position_manager);

        $sales = new User();
        $sales->name='Joni';
        $sales->surname='Cama';
        $sales->email='jonicama@gmail.com';
        $sales->phone='0692446673';
        $sales->passport='JB0452255B';
        $sales->wage='30000';
        $sales->password=bcrypt('sales');
        $sales->save();
        $sales->positions()->attach($position_sales);

        $disp = new User();
        $disp->name='Sara';
        $disp->surname='Mila';
        $disp->email='saramila@gmail.com';
        $disp->phone='0692444653';
        $disp->passport='JB0452283B';
        $disp->wage='25000';
        $disp->password=bcrypt('dispatcher');
        $disp->save();
        $disp->positions()->attach($position_disp);

        $inv = new User();
        $inv->name='Liza';
        $inv->surname='Kushti';
        $inv->email='lizakushti@gmail.com';
        $inv->phone='0692643257';
        $inv->passport='JB0452502B';
        $inv->wage='40000';
        $inv->password=bcrypt('inventory');
        $inv->save();
        $inv->positions()->attach($position_inv);

        $deliv = new User();
        $deliv->name='Kristi';
        $deliv->surname='Canaj';
        $deliv->email='kristicanaj@gmail.com';
        $deliv->phone='0692098975';
        $deliv->passport='J73920174B';
        $deliv->wage='35000';
        $deliv->password=bcrypt('delivery');
        $deliv->save();
        $deliv->positions()->attach($position_deliv);
    }
}
