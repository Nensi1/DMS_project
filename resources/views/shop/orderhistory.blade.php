@extends('layouts.client-app')

@push('scriptArea')
<script src="{{ asset('js/area.js')}}"></script>
@endpush

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
        <div class="col-md-8">
            <HR>
            <div class="card" style="width: 70em;">
                <div class="card-header"><h4>{{ __('MY ORDER HISTORY') }}</h4></div>

                <div class="card-body">
                    <div class="form-group row">
                            <div class="col-md-6">
                            <b>Payment Status:</b> <a href="/order/?payment_status=Unpaid">Unpaid</a> | 
                            <a href="/order/?payment_status=Paid">Paid</a> | 
                            <a href="/order">Reset</a>
                        </div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Total (LEK)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Type</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col"></th> <!--delete-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                @if($order->client_id==Auth::user()->id)
                                @if($order->status==="Accepted")
                                <tr class="table-warning">
                                    <th scope="row">{{$loop->iteration }}</th>
                                    <td>{{$order->total}}</td>
                                    <td><a href="/order/{{$order->id}}"><button type="button" class="btn btn-outline-dark">{{$order->status}}</button></a></td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->payment!=('CASH'))
                                    <td>CARD</td>
                                    @else
                                    <td>CASH</td>
                                    @endif
                                    <td>{{$order->payment_status}}</td>
                                    <td> 
                                    <form method="POST" action="{{route('delete.order', ['order'=>$order->id])}}"> <!--route('cartline.destroy', ['cartline'=>$cartline->id])-->
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                           <div class="field">
                                               <div class="control">
                                                   <button type="submit" class="btn btn-outline-danger">Delete</button>
                                               </div>
                                           </div>
                                        </form>
                                    </td>
                                </tr>
                                @elseif($order->status==="In Progress")
                                <tr class="table-secondary">
                                    <th scope="row">{{$loop->iteration }}</th>
                                    <td>{{$order->total}}</td>
                                    <td><a href="/order/{{$order->id}}"><button type="button" class="btn btn-outline-dark">{{$order->status}}</button></a></td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->payment!=('CASH'))
                                    <td>CARD</td>
                                    @else
                                    <td>CASH</td>
                                    @endif                                    <td>{{$order->payment_status}}</td>
                                    <td> 
                                        <form method="POST" action="{{route('delete.order', ['order'=>$order->id])}}"> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="field">
                                                <div class="control">
                                                    <button type="submit" class="btn btn-outline-danger" disabled>Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @elseif($order->status==="Shipped")
                                <tr class="table-primary">
                                    <th scope="row">{{$loop->iteration }}</th>
                                    <td>{{$order->total}}</td>
                                    <td><a href="/order/{{$order->id}}"><button type="button" class="btn btn-outline-dark">{{$order->status}}</button></a></td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->payment!=('CASH'))
                                    <td>CARD</td>
                                    @else
                                    <td>CASH</td>
                                    @endif
                                    <td>{{$order->payment_status}}</td>
                                    <td> 
                                        <form method="POST" action="{{route('delete.order', ['order'=>$order->id])}}"> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="field">
                                                <div class="control">
                                                    <button type="submit" class="btn btn-outline-danger" disabled>Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @elseif($order->status==="Completed")
                                <tr class="table-success">
                                    <th scope="row">{{$loop->iteration }}</th>
                                    <td>{{$order->total}}</td>
                                    <td><a href="/order/{{$order->id}}"><button type="button" class="btn btn-outline-dark">{{$order->status}}</button></a></td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->payment!=('CASH'))
                                    <td>CARD</td>
                                    @else
                                    <td>CASH</td>
                                    @endif                                    
                                    <td>{{$order->payment_status}}</td>
                                    <td> 
                                        <form method="POST" action="{{route('delete.order', ['order'=>$order->id])}}"> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="field">
                                                <div class="control">
                                                    <button type="submit" class="btn btn-outline-danger" disabled>Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @elseif($order->status==="Cancelled")
                                <tr class="table-danger">
                                    <th scope="row">{{$loop->iteration }}</th>
                                    <td>{{$order->total}}</td>
                                    <td><a href="/order/{{$order->id}}"><button type="button" class="btn btn-outline-dark">{{$order->status}}</button></a></td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->payment!=('CASH'))
                                    <td>CARD</td>
                                    @else
                                    <td>CASH</td>
                                    @endif                                    <td>{{$order->payment_status}}</td>
                                    <td> 
                                        <form method="POST" action="{{route('delete.order', ['order'=>$order->id])}}"> 
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="field">
                                                <div class="control">
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection