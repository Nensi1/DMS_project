@extends('layouts.app')

@section('content')

<div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">WEEKLY SCHEDULE</h3>
        <div class="card-body">
          <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                  class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
            <table class="table table-bordered table-responsive-md table-striped">
              <thead>
                <tr>
                <form method="POST" action="{{route('store.schedule')}}">
                    @csrf
                    <th class="text-center">Employee Name</th>
                    @foreach($days as $day)
                    <th class="text-center">{{$day->day}}</th>
                    @endforeach
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="pt-3-half" contenteditable="true"> 
                  <select name="user" class="mdb-select md-form" style="width: 80px;">
                      <option value="" selected>--Select--</option>
                      @foreach($users as $user)
                      @if($user->hasPosition('Sales Agent'))
                      <option>{{ $user->name }}</option>
                      @endif
                      @endforeach
                    </select>
                  </td>
                  @foreach($days as $day)
                  <td class="pt-3-half" contenteditable="true">
                      <div>
                     <label for="area">{{ __('Area') }}</label>
                    <select name="area[]" class="mdb-select md-form" style="width: 80px;">                      <option value="" selected>--Select--</option>
                      @foreach ($areas as $area) 
                      <option>{{ $area->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div>
                    <label for="category">{{ __('Category') }}</label>
                    <select name="category[]" class="mdb-select md-form"  style="width: 80px;">
                      <option value="" selected>--Select--</option>
                      @foreach ($category as $categ) 
                      <option>{{ $categ->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </td>
                @endforeach
                <td>
                  <button type="submit" class="btn btn-success btn-rounded btn-md my-0">Create</button>
                </td>
              </form>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Editable table -->
@endsection