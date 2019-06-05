@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(!empty($failure_message))
                <div class="alert alert-danger">
                    {{$failure_message}} <a href="/user/clients/list">here</a>
                </div>
                <div></div>
                @else
                <form action="user/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="search"
                            placeholder="Search Name / Email" size="35"> <span class="input-group-btn">
                        </span>
                    </div>
                </form>
                @endif
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Base Wage</th>
                            <th>Bonus</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        {{-- <form method="GET" action="{{route('edit.users')}}">
                            @csrf --}}
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->hasPosition('Admin') ? 'Admin' : ''}}
                                {{$user->hasPosition('Manager') ? 'Manager' : ''}}
                                {{$user->hasPosition('Delivery') ? 'Delivery' : ''}}
                                {{$user->hasPosition('Order Dispatcher') ? 'Order Dispatcher' : ''}}
                                {{$user->hasPosition('Sales Agent') ? 'Sales Agent' : ''}}
                                {{$user->hasPosition('Inventory Supervisor') ? 'Inventory Supervisor' : ''}}</td>
                            <td>{{$user->wage}}</td>
                            @foreach($bonuses as $bonus)
                            @if($bonus->user_id==$user->id)
                            <td>{{$bonus->payment}}</td>
                            @endif
                            @endforeach
                            @foreach($scores as $score)
                            @if($score->user_id==$user->id)
                            <td>{{$score->total}}</td>
                            @endif
                            @endforeach
                            {{-- <td><input type="submit" value="SHOW"></p></td> --}}
                            <td><a href="/user/{{$user->id}}"><button type="submit" class="btn btn-dark">Show</button></a></td>
                        </tr>
                        {{-- </form> --}}
                        @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            </div>
    </div>
</div>
<hr>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
           <div class="card-header" style="background: white;color: blue;">
                <h4>Salary History</h4></div>
                <div class="form-group row">
                    <label for="month" class="col-md-4 col-form-label text-md-right">{{ __('Month') }}</label>
                    <div class="col-md-6">
                    <form method="POST" action="/user/month">
                        @csrf
                        <select name="month" class="form-control" id="month" style="width:200px;">
                            <option value="">-- Select --</option>
                            <option>Jan</option>
                            <option>Feb</option>
                            <option>Mar</option>
                            <option>Apr</option>
                            <option>May</option>
                            <option>Jun</option>
                            <option>Jul</option>
                            <option>Aug</option>
                            <option>Sep</option>
                            <option>Oct</option>
                            <option>Nov</option>
                            <option>Dec</option>
                        </select>
                        <button type="submit"  class="btn btn-primary">Check</button>
                    </form>
                    </div>
                </div>
                @if($show)

           <div class="card-body text-primary">
               <div class="form-group row">
                   <table class="table table-sm">
                       <thead>
                           <tr>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Base Wage</th>
                            <th scope="col">Bonus</th>
                            <th scope="col">Score</th>
                            <th scope="col">Salary</th> <!--delete-->
                        </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                            @foreach($salaries as $salary)
                            @if($salary->month==$month)
                                <th>{{$salary->user->name}}</th>
                                <td>{{$salary->wage}}</td>
                                <td>{{$salary->bonus}}</td>
                                <td>{{$salary->score}}</td>
                                <td>{{$salary->total}}</td>
                                </tr>
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
@endsection
