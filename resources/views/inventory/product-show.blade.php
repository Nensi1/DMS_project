@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">

            <div class="card-header">
                <div class="field">
                        <form method="GET" action="/products/{{$product->id}}/edit">
                            @csrf
                            <div class="control">
                                <button type="submit" class="btn btn-outline-primary">Edit Product</button>
                            </div>
                        </form>
                </div></div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td colspan="2"><img src="{{ asset($product->image) }}" style="width: 120px; border-radius: 50%;"> </td>
                            <tr>
                            <th scope="row">{{ __('Name') }}</th>
                            <td>{{ $product->name}}</td>
                            </tr>

                            <tr>
                                <th scope="row">{{ __('Barcode') }}</th>
                                <td>{{ $product->barcode}}</td>
                            </tr>

                            <tr>
                            <th scope="row">{{ __('Description') }}</th>
                            <td>{{ $product->description}}</td>
                            </tr>
                                    
                            <tr>
                            <th>{{__('Category') }}</th>
                            <td>{{ $product->category}}</td>
                            </tr>

                            <tr>
                            <th>{{__('Quantity') }}</th>
                            <td>{{ $product->quantity}}</td>
                            </tr>

                            <tr>
                            <th>{{__('Unit') }}</th>
                            <td>{{ $product->unit}}</td>
                            </tr>
                            
                            <tr>
                            <th>{{__('Buy Price') }}</th>
                            <td>{{ $product->buy_price}} </td>
                            </tr>

                            <tr>
                            <th>{{__('Sell Price') }}</th>
                            <td>{{ $product->sell_price}}</td>
                            </tr>

                        </tbody>
                    </table>
                        <form method="POST" action="/products/{{$product->id}}">
                            @csrf
                            @method('DELETE')
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="btn btn-outline-danger">Delete Product</button>
                                </div>
                    
                            </div>
                        
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection