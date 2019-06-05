<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;
use App\Supplier;
use App\Http\Traits\UploadTrait;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    use UploadTrait;
    public function run()
    {
        $product = new Product();
        $product->name='Lemon Zero';
        $product->description='Soda Cation 8,3 mg/1l';
        $product->quantity='0';
        $product->barcode='2019283723';
        $product->unit='COPE';
        $product->buy_price='50';
        $product->sell_price='90';
        $product->product_image='uploads/lemon-zero_1558900438.png';
        $product->category= 'Isotonic Drink';
        $supplier=Supplier::where('name', 'Cimi')->first();
        $product->supplier()->associate($supplier);
        $product->save();


        $product2 = new Product();
        $product2->name='Blue';
        $product2->description='Soda Cation 8,3 mg/1l';
        $product2->quantity='0';
        $product2->barcode='2019283742';
        $product2->unit='COPE';
        $product2->buy_price='50';
        $product2->sell_price='90';
        $product2->product_image='uploads/blue_1558901245.png';
        $product2->category= 'Isotonic Drink';
        $supplier2=Supplier::where('name', 'Cimi')->first();
        $product2->supplier()->associate($supplier2);
        $product2->save();

        $product3 = new Product();
        $product3->name='Blue';
        $product3->description='No gluten, no sugar';
        $product3->quantity='0';
        $product3->barcode='2019283709';
        $product3->unit='COPE';
        $product3->buy_price='20';
        $product3->sell_price='60';
        $product3->product_image='uploads/blue_1558901258.png';
        $product3->category= 'Isotonic Drink';
        $supplier3=Supplier::where('name', 'Cimi')->first();
        $product3->supplier()->associate($supplier3);
        $product3->save();
    }
}
