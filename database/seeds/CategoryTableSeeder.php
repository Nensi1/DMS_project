<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categ_gym= new Category();
        $categ_gym->name='Gym';
        $categ_gym->save();

        $categ_market= new Category();
        $categ_market->name='Supermarket';
        $categ_market->save();

        $categ_bar= new Category();
        $categ_bar->name='Bar/Restaurant';
        $categ_bar->save();

        $categ_other= new Category();
        $categ_other->name='Other';
        $categ_other->save();
    }
}
