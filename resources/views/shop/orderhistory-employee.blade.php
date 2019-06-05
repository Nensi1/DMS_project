@extends('layouts.app')

@push('styleArea')
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
                        <b>Payment Status:</b> <a href="/orders/?payment_status=Unpaid">Unpaid</a> | 
                        <a href="/orders/?payment_status=Paid">Paid</a> | 
                        <a href="/orders">Reset</a>
                    </div>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    @if(Auth::user()->hasPosition('Admin') || Auth::user()->hasPosition('Manager') )
                                    <th scope="col">Employee</th>
                                    @endif
                                    <th scope="col">Client</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Total (LEK)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Type</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                @if($order->status=="Accepted")
                                <tr class="table-warning">
                                @elseif($order->status=="In Progress")
                                <tr class="table-secondary">
                                @elseif($order->status=="Shipping")
                                <tr class="table-primary">
                                @elseif($order->status=="Completed")
                                <tr class="table-success"> 
                                @elseif($order->status=="Cancelled")
                                <tr class="table-danger">
                                @endif
                                    <th scope="row">{{$loop->iteration }}</th>
                                    @if(Auth::user()->hasPosition('Admin') || Auth::user()->hasPosition('Manager') )
                                    @if($order->user_id!=null)
                                    <td><a href="/user/{{$order->user->id}}">{{$order->user->name}}</a></td>
                                    @else
                                    <td>--</td>
                                    @endif
                                    @endif
                                    <td><a href="/user/clients/{{$order->client->id}}">{{$order->client->name}}</a></td>
                                    <td>{{$order->client->address}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>
                                            <div class="control">
                                                    <button type="submit" class="btn btn-outline-dark"data-toggle="modal" data-target="#status{{$loop->index}}"> {{$order->status}}</button>
                                                </div>
                                            <div class="modal" tabindex="-1" role="dialog" id="status{{$loop->index}}">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Order is <br/><h3>{{$order->status}}</h3><b></b></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <div class="progress">
                                                                    @if($order->status=="Accepted")
                                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    @elseif($order->status=="In Progress")
                                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    @elseif($order->status=="Shipping")
                                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>                                                        
                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    @elseif($order->status=="Completed")
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>                                                        
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div> 
                                   </td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->payment!=('CASH'))
                                    <td>CARD</td>
                                    @else
                                    <td>CASH</td>
                                    @endif
                                    <td>{{$order->payment_status}}</td>
                                    <td>@foreach($details as $detail)
                                        @if($detail->order_id==$order->id)
                                        @include('shop/delivery')
                                       @endif
                                       @endforeach
                                    </td>
                                    <td> 
                                    @if(Auth::user()->hasPosition('Admin') || Auth::user()->hasPosition('Manager') )

                                    @if($order->status=="Accepted")

                                    <form method="POST" action="{{route('delete.order-user', ['order'=>$order->id])}}"> <!--route('cartline.destroy', ['cartline'=>$cartline->id])-->
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                               <div class="control">
                                                   <button type="submit" class="btn btn-outline-danger">Delete</button>
                                               </div>
                                        </form>
              
                                    @endif
                                    @endif
                                    </td>
                                    <td>
                                        @include('shop/bill')
                                    </td> 
                                </tr>
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

@push('scriptArea')
<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endpush
@endsection