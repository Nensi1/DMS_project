<?php

use Illuminate\Database\Seeder;
use App\Supplier;
class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier();
        $supplier->name='Cimi';
        $supplier->save();

        $supplier = new Supplier();
        $supplier->name='Berti';
        $supplier->save();
    }
}
