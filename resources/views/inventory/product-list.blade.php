@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(!empty($failure_message))
                <div class="alert alert-danger">
                    {{$failure_message}} <a href="/products">here</a>
                </div>
                @endif
                @if(!empty($failure_message))
                <div></div>
                @else
                <form action="products/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="search"
                            placeholder="Search Name / Barcode / Category" size="35"> <span class="input-group-btn">
                        </span>
                    </div>
                </form>
                @endif
            {{-- <div class="container"> --}}
     
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Quanitity</th>
                            <th>Unit</th>
                            <th>Bought at</th>
                            <th>Sold at</th>
                            <th></th>
                            <th>
                                @csrf
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#order"> {{ __('New Order') }}</button></th>
                        </th>
  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->supplier->name}}</td>
                            <td>{{$product->barcode}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->unit}}</td>
                            <td>{{$product->buy_price}}</td>
                            <td>{{$product->sell_price}}</td>
                            <td><a href="products/{{$product->id}}"><img src="{{ asset($product->image) }}" style="height: 40px; border-radius: 50%;"></a></td>
                            <td>
                                @include('inventory/stock');
                            </td>
                        </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                {{$products->links()}}
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
