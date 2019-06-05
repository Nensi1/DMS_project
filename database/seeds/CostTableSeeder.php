<?php

use Illuminate\Database\Seeder;
use App\Cost;
use App\User;
class CostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cost1= new Cost();
        $cost1->name='Warehouse Rent';
        $cost1->amount='0';
        $cost1->category='Holding Cost';
        $cost1->repeat='Monthly';
        $cost1->save();

        $cost2= new Cost();
        $cost2->name='Warehouse Salaries';
        $cost2->amount='0';
        $cost2->category='Holding Cost';
        $cost2->repeat='Monthly';
        $cost2->save();
        
        $cost3= new Cost();
        $cost3->name='Warehouse Salaries';
        $cost3->amount='0';
        $cost3->category='Holding Cost';
        $cost3->repeat='Monthly';
        $cost3->save();

        $cost4= new Cost();
        $cost4->name='Inventory Insurance';
        $cost4->amount='0';
        $cost4->category='Holding Cost';
        $cost4->repeat='Monthly';
        $cost4->save();

        $cost5= new Cost();
        $cost5->name='Inventory Spoilage';
        $cost5->amount='0';
        $cost5->category='Holding Cost';
        $cost5->repeat='Once';
        $cost5->save();
        
        $cost6= new Cost();
        $cost6->name='Inventory Pilferage';
        $cost6->amount='0';
        $cost6->category='Holding Cost';
        $cost6->repeat='Once';
        $cost6->save();

        $cost7= new Cost();
        $cost7->name='Receiving Inspection';
        $cost7->amount='0';
        $cost7->category='Ordering Cost';
        $cost7->repeat='Once';
        $cost7->save();

        $cost8= new Cost();
        $cost8->name='Shipping';
        $cost8->amount='0';
        $cost8->category='Ordering Cost';
        $cost8->repeat='Once';
        $cost8->save();

        $cost9= new Cost();
        $cost9->name='Purchase Order Supplies';
        $cost9->amount='0';
        $cost9->category='Ordering Cost';
        $cost9->repeat='Once';
        $cost9->save();  
        
        $cost10= new Cost();
        $cost10->name='Custom';
        $cost10->amount='0';
        $cost10->category='Ordering Cost';
        $cost10->repeat='Once';
        $cost10->save();

        $cost11= new Cost();
        $cost11->name='Accounting Department Salary';
        $cost11->amount='0';
        $cost11->category='Ordering Cost';
        $cost11->repeat='Monthly';
        $cost11->save();
    }
}
