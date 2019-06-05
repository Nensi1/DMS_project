<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categ_gym= new ProductCategory();
        $categ_gym->name='Isotonic Drinks';
        $categ_gym->save();

        $categ_market= new ProductCategory();
        $categ_market->name='Muesli Bars';
        $categ_market->save();

        $categ_bar= new ProductCategory();
        $categ_bar->name='Energy Drinks';
        $categ_bar->save();
    }
}
