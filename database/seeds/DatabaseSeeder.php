<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PositionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BonusTableSeeder::class);
        $this->call(ScoreTableSeeder::class);
        $this->call(WeekDaysTableSeeder::class);
        $this->call(CostTableSeeder::class);
    }
}
