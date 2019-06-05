<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\Supplier;
use App\Http\Traits\UploadTrait;
use Stripe\Stripe;
use App\StockNr;
use Stripe\Charge;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    use UploadTrait;
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $numbers=StockNr::all();
        $products=Product::paginate(7);
        return view("/inventory/product-list",compact('products','numbers'));

    }

    public function create()
    {
        $category=ProductCategory::all();
        $suppliers= Supplier::all();
        return view('inventory.product-create',compact('category','suppliers'));
    }

    

    public function edit(Product $product)
    {
        $category=ProductCategory::all();
        $suppliers= Supplier::all();
        return view('/inventory/product-edit', compact('product','category','suppliers'));
    }

    public function show(Product $product)
    {
    return view('inventory/product-show', compact('product'));
    }
    public function store(Product $product)
    {
        // Form validation

        $validated= request()->validate([
            'name'              =>  'required',
            'product_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Set product name
        $product->name = request('name');

        // // Check if a profile image has been uploaded
        // if ($request->has('product_image')) {
            // Get image file
            $image = request('product_image');
            // Make a image name based on product name and current timestamp
            $name = str_slug(request('name')).'_'.time();
            // Define folder path
            $folder = 'uploads/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set product profile image path in database to filePath
            $product->product_image = $filePath;
        // }

        $supplier=Supplier::where('name', request('supplier'))->first();
        
        $product->name=request('name');
        $product->barcode=request('barcode');
        $product->description=request('description');
        $product->category=request('prod_category');
        $product->quantity=request('quantity');
        $product->unit=request('unit');
        $product->buy_price=request('buy_price');
        $product->sell_price=((((int)request('sell_prof')+100)/100)*(int)request('buy_price'))*1.2;
        
        $product->supplier()->associate($supplier);
        // Persist product record to database
        $product->save();

        // Return product back and show a flash message
        return redirect('/products');
    }

    public function update(Product $product)
    {
        // Form validation

        $validated= request()->validate([
            'name'              =>  'required',
            'product_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Set product name
        $product->name = request('name');

        // // Check if a profile image has been uploaded
        // if ($request->has('product_image')) {
            // Get image file
            $image = request('product_image');
            // Make a image name based on product name and current timestamp
            $name = str_slug(request('name')).'_'.time();
            // Define folder path
            $folder = 'uploads/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set product profile image path in database to filePath
            $product->product_image = $filePath;
        // }

        $supplier=Supplier::where('name', request('supplier'))->first();
        
        $product->name=request('name');
        $product->barcode=request('barcode');
        $product->description=request('description');
        $product->category=request('prod_category');
        $product->quantity=request('quantity');
        $product->unit=request('unit');
        $product->buy_price=request('buy_price');
        $product->sell_price=request('sell_price')*1.2;
        
        $product->supplier()->associate($supplier);
        // Persist product record to database
        $product->update();

        // Return product back and show a flash message
        return redirect('/products');
    }
    public function search(){
        $search = Input::get ( 'search' );
        $products = Product::where('barcode','LIKE','%'.$search.'%')->orWhere('name','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(7);
        if(count($products) > 0)
            return view('inventory/product-list',compact('products'))->withQuery ( $search );
        else return view ('inventory/product-list',compact('products'))->with('failure_message','No Details found. Try to search again !');
    }

}
