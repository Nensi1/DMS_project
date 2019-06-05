@extends('layouts.app')


@section('content')
<div class="container">
     <div class="row justify-content-center">
    <HR>
        @if(!empty($success_message))
        <div class="alert alert-success">
            {{$success_message}}
        </div>
        @endif 
    <div class="card" style="width: 80em;">
        <div class="card-header" style="background: #2e6da4;color: white;"><h4>{{ __('MY TASK ORDERS') }}</h4>                </div>
        <div class="card-body">
            <div class="form-group row">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Mark as Done</th>
                            <th scope="col"></th> <!--delete-->
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $ord)
                            @if ($ord->status=="Accepted")
                            <tr class="table-warning">
                                <th scope="row">{{$loop->iteration }}</th>
                                <td><a href="/user/clients/{{$ord->client->id}}">{{$ord->client->name}}</a></td>
                                <td><a href="/ord/{{$ord->id}}"><button type="button" class="btn btn-outline-dark">{{$ord->status}}</button></a></td>
                                <td>{{$ord->created_at}}</td>
                                <td>
                                    <form method="POST" action="/dispatcher/{{ $ord->id }}">
                                    @method('PATCH')
                                    @csrf
                                        <label class="checkbox {{ $ord->status=="In progress" ? 'is-complete' : ''}}" for="completed">
                                            <input  type="checkbox" name="completed" onChange="this.form.submit()" {{ $ord->status=="In progress" ? 'checked' : ''}}> 
                                        </label>
                                    </form>
                                </td>
                                <td><a href="/dispatcher/{{$ord->id}}">
                                    <div class="control">
                                        <button type="submit" class="btn btn-outline-primary">Check</button>
                                    </div></a>
                                </td> 
                            </tr>
                            @endif
                            {{-- @if($count<1)
                            <div class="alert alert-success">
                                    You have completed your dispatches
                            </div>
                            @endif --}}

                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<hr>
@if($show)
<div class="container">
        <div class="row justify-content-center">
       <div class="card border-primary mb-3" style="width: 80em;">
           <div class="card-header" style="background: white;color: blue;"><h4>Order # {{$order->id}}</h4>                </div>
           <div class="card-body text-primary">
               <div class="form-group row">
                   <table class="table table-sm">
                       <thead>
                           <tr>
                            <th scope="col">#Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th> <!--delete-->
                        </tr>
                    </thead>
                    <tbody>
                    
                    <tr class="table-warning">
                        @if ($order->status=="Accepted")
                        @foreach($orderlines as $orderline)
                        @if($orderline->order_id==$order->id)
                            @foreach($products as $product)
                            @if($product->id==$orderline->product_id)
                            <th scope="row">{{$product->barcode}}</th>
                            <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
                            <td>{{$orderline->quantity}}</td>
                            </tr>
                            @endif
                            @endforeach
                        @endif
                        @endforeach 
                        @endif
                    </tr>
                       
                    </tbody>
                </table>
                     
          </h5>
          <p class="card-text"></p>
        </div>
      </div>
</div></div></div>
@endif
@endsection