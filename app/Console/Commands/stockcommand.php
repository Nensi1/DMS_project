<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Product;
use App\Stock;


class stockcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock_command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products=Product::all();
        foreach($products as $product)
        {
         $stock=new Stock;   
         $stock->product_id=$product->id;
         $stock->save();
         $product->initial_q='0';
         $product->update();
        }
    }
}
