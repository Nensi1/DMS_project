@extends('layouts.app')

@section('content')
<div class="container">
    @include('inventory/cost-create')
    <div class="row justify-content-center">
        <div class="col-md-12">
                @if(!empty($failure_message))
                <a href="/cost"> Reset</a>
                <div class="alert alert-danger">
                    {{$failure_message}}
                </div>
                @endif
                @if(!empty($failure_message))
                <div></div>
                @else
                <form action="cost/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div>
                        <a href="/cost"> Reset</a>
                    </div>
                    <div class="input-group">
                        <input type="text" name="search"
                            placeholder="Search Name / Category" size="35"> <span class="input-group-btn">
                        </span>
                    </div>
                </form>
                @endif
            {{-- <div class="container"> --}}
                    <div class="row-fluid text-center">
                            <div class="col-xs-6">
                                          <table class="table table-hover" style="width: 30em;float:left;">
                    <thead class="table-info">
                        <tr>
                            <th colspan="4">Holding Costs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($costs as $cost)
                        @if($cost->category=="Holding Cost")
                        <tr>
                            <td class="text-left">{{$cost->name}}</td>
                            <td>
                            <form method="POST" action="{{route('amount.update', ['cost'=>$cost->id])}}">{{--   --}}
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                             <input type="text" name="amount"  size="5" id="amount"value="{{$cost->amount}}" class="form-control" required>
                            </form>
                            </td>
                            <td>
                                <form method="POST" action="{{route('repeat.update', ['cost'=>$cost->id])}}">{{--   --}}
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                <input type="text" name="repeat"  size="9" id="repeat" value="{{$cost->repeat}}" class="form-control" required>
                                </form>
                            </td>
                            <td>{{$cost->created_at->toDateString()}}</td>
                            <td>  
                                <form method="POST" action="{{route('cost.destroy', ['cost'=>$cost->id])}}">{{--  --}}
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="field">
                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td><b>Total</b></td>
                            <td><b>{{$totalH}}</b></td>
                        </tr>                        
                    </tbody>
                </table>
                <hr>
            </div>
                <div class="col-xs-6">

                <table class="table table-hover" style="width: 30em;float:right">
                        <thead class="table-warning">
                            <tr>
                                <th colspan="4">Ordering Costs</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($costs as $cost)
                            @if($cost->category=="Ordering Cost")
                            <tr>
                                <td class="text-left">{{$cost->name}}</td>
                                <td>
                                    <form method="POST" action="{{route('amount.update', ['cost'=>$cost->id])}}">{{--   --}}
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                    <input type="text" name="amount"  size="9" id="amount"value="{{$cost->amount}}" class="form-control" required>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{route('repeat.update', ['cost'=>$cost->id])}}">{{--   --}}
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                    <input type="text" name="repeat"  size="9" id="repeat"value="{{$cost->repeat}}" class="form-control" required>
                                    </form>
                                </td>
                                <td>{{$cost->created_at->toDateString()}}</td>
                                <td>  
                                    <form method="POST" action="{{route('cost.destroy', ['cost'=>$cost->id])}}">{{--  --}}
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="field">
                                        <button type="submit" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                    <td><b>Total</b></td>
                                    <td><b>{{$totalC}}</b></td>
                                </tr>           
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div>
            <form method="POST" action="{{ route('store.eoq') }}">
                    @csrf
                <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"> {{ __('Compute EOQ') }}</button>
                    </div>
                </form>
                @if($show==true)
                <div class="row justify-content-center">
                <table class="table table-hover" style="width: 30em;float:right">
                        <thead class="table-success">
                            <tr>                
                                <th>Demand</th>
                                <th>Holding Cost/Unit</th>
                                <th>Ordering Cost/Unit</th>
                                <th>EOQ</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <td><b>{{$neweoq->demand}}</b></td>
                                    <td><b>{{$neweoq->hc}}</b></td>
                                    <td><b>{{$neweoq->oc}}</b></td>
                                    <td><h2 style="color:red;">{{$neweoq->eoq}}</h2></td>
                                    <td><b>{{$neweoq->year}}</b></td>
                                </tr>           
                        </tbody>
                    </table>
                </div>
                @endif
        {{-- @include('inventory/eoq') --}}
    </div>
</div>
@endsection
