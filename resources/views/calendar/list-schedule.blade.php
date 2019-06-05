@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
           <div class="card-header" style="background: white;color: blue;">
                <h4>Weekly Schedule</h4></div>
                <div class="form-group row">
                    <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Employee') }}</label>
                    <div class="col-md-6">
                    <form method="POST" action="/schedule/check">
                        @csrf
                        <select name="user" class="form-control" id="user" style="width:200px;">
                            <option value="" required>-- Select --</option>
                            @foreach($users as $user)
                            @if($user->hasPosition('Sales Agent'))
                            <option>{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                        <button type="submit"  class="btn btn-primary">Check</button>
                    </form>
                    </div>
                </div>

            @if($show)
            {{-- <div>
                <button type="submit"  class="btn btn-warning">Edit</button>
            </div> --}}
           <div class="card-body text-primary">
               <div class="form-group row">
                   <table class="table table-sm">
                       <thead>
                           <th></th>
                            @foreach($days as $day)
                            <th scope="col">{{$day->day}}</th>
                            @endforeach
                    </thead>
                    <tbody>
                    
                    <tr>
                        <th>Area</th>
                        @foreach($schedules as $sched)
                        @foreach($areas as $area)
                        @if($area->id==$sched->area_id)
                            <td>{{$area->name}}</td>                        
                        @endif
                        @endforeach
                        @endforeach 
                    </tr>
                    {{-- <th>
                            {{$sched->user->name}}
                    </th>               --}}
                    <tr>
                        <th>Category</th>
                        @foreach($schedules as $sched)
                        @foreach($category as $categ)
                        @if($categ->id==$sched->category_id)
                            <td>{{$categ->name}}</td>                        
                        @endif
                        @endforeach
                        @endforeach 
                    </tr>
                       
                    </tbody>
                </table>
                @endif
                     
          </h5>
          <p class="card-text"></p>
        </div>
      </div>
</div></div></div>
@endsection