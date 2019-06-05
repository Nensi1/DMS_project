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
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Shipping</th>
                            <th scope="col">Completed</th>
                            <th scope="col"></th><!--check-->
                            <th scope="col"></th><!--delete-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $ord)
                        <tr class="table-warning">
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$ord->client->name}}</td>
                            <td>{{$ord->client->address}}</td>
                            <td>{{$ord->client->city}}</td>
                            <td>{{$ord->client->phone}}</td>
                            <td>{{$ord->created_at}}</td>
                            <td><button type="button" class="btn btn-outline-dark">{{$ord->status}}</button></a></td>
                            @if($ord->status=="Completed")
                            <td><label class="checkbox is-complete" for="completed" disabled>
                                    <input  type="checkbox" name="completed" onChange="this.form.submit()" checked disabled> <!--instead of using a submit button -->
                                </label>
                            </td> 
                            <td>
                                <div class="control">
                                       <img src="https://s3.amazonaws.com/peoplepng/wp-content/uploads/2018/06/06125806/Green-Tick-PNG-Transparent-Image.png" width="30pt;">
                                </div>
                            </td>
                                @else
                            <td>
                                    <form method="POST" action="/delivery/{{ $ord->id }}">
                                    @method('PATCH')
                                    @csrf
                                        <label class="checkbox {{ $ord->status=="Shipping" ? 'is-complete' : ''}}" for="completed">
                                            <input  type="checkbox" name="completed" onChange="this.form.submit()" {{ $ord->status=="Shipping" ? 'checked' : ''}}> <!--instead of using a submit button -->
                                        </label>
                                    </form>
                                </td>
                                <td>
                                <div class="control">
                                    <button type="submit" class="btn btn-outline-success"data-toggle="modal" data-target="#test{{$loop->index}}"> {{ __('COMPLETE') }}</button>
                                </div>
                                <form method="POST" action="/delivery/complete/{{ $ord->id }}"> 
                                @method('PATCH')
                                @csrf
 
                                <div class="modal" tabindex="-1" role="dialog" id="test{{$loop->index}}">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Total <br/><h3>{{$ord->total}}</h3><b>LEK</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                        <label for="pym-status" class="col-form-label">Payment Status:</label>
                                                        <select name="pym-status" class="form-control" id="pym-status" style="width:100px;">
                                                            <option value=""></option>
                                                            <option>Unpaid</option>
                                                            <option>Paid</option>
                                                        </select>
                                                    </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Comment:</label>
                                                    <textarea class="form-control" name="comment" id="message-text"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">COMPLETE ORDER</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div> 
                            </td> 
                            @endif
                            <td><a href="/delivery/order/{{$ord->id}}">
                                <div class="control">
                                    <button type="submit" class="btn btn-outline-primary">Check Order</button>
                                </div></a>
                            </td> 
                            <td>
                                <form method="POST" action="{{route('delivery.delete', ['order'=>$ord->id])}}">{{--  --}}
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="field">
                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </form>
                        </tr>
                      
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@if($show)
<div class="container">
        <div class="row justify-content-center">
       <div class="card border-primary mb-3" style="width: 80em;">

           <div class="card-header" style="background: white;color: blue;"><h4>Order # {{$order->id}}</h4> 
            <a href="/delivery"><button type="submit" class="close" style="background:red;" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></a>
        </div>
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
                    </tr>
                       
                    </tbody>
                </table>
                     
          </h5>
          <p class="card-text"></p>
        </div>
      </div>
</div></div></div>
@endif
@push('scriptArea')
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endpush
@endsection