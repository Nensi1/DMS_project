@extends('layouts.app')

@section('content')

<div class="card" style="width: 50rem;">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">WEEKLY SCHEDULE</h3>
        <div class="card-body">
          <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                  class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
            <table class="table table-bordered table-responsive-md table-striped text-center">
              <thead>
                <tr>
                    <th class="text-center">Day</th>
                    {{-- @foreach($days as $day)
                    <th class="text-center">{{$day->day}}</th>
                    @endforeach
                </tr>
              </thead>
              <tbody>
                  @foreach($schedules as $sched)
                  @foreach($users as $user)
                  @if($user->hasPosition('Sales Agent'))
                  @if($sched->user_id==$user->id)
                  {{ $user->name }} --}}
                  @foreach($users as $user)
                  @if($user->hasPosition('Sales Agent'))
                  <th class="text-center">Employee: {{$user->name}}</th>
                  @endif
                  @endforeach
              </tr>
            </thead>
            <tbody>
                @foreach($schedules as $sched)
                @foreach($users as $user)
                @if($user->hasPosition('Sales Agent'))
                @if($sched->user_id==$user->id)
                {{-- Employee: {{ $user->name }} --}}
                <tr>
                    
                @if($sched->weekdays_id==1)
                
                @foreach($days as $day)
                @if($day->id==1)
                <td class="pt-3-half" contenteditable="true">
               {{$day->day}} 
              </td>
               @endif
                @endforeach
                  <td class="pt-3-half" contenteditable="true">
                      <div>
                     <label for="area">{{ __('Area') }}</label> 
                     {{$sched->area->name}}
                  </div>
                  <div>
                    <label for="category">{{ __('Category') }}</label>
                     {{$sched->category->name}}
                  </div>
                  </td>
                  
                  @elseif($sched->weekdays_id==2)
                  
                  @foreach($days as $day)
                  @if($day->id==2)
                  <td class="pt-3-half" contenteditable="true">
                 {{$day->day}} 
                </td>
                 @endif
                  @endforeach
                  <td class="pt-3-half" contenteditable="true">
                      <div>
                     <label for="area">{{ __('Area') }}</label> 
                     {{$sched->area->name}}
                  </div>
                  <div>
                    <label for="category">{{ __('Category') }}</label>
                     {{$sched->category->name}}
                  </div>
                  </td>

                  @elseif($sched->weekdays_id==3)
                  
                  @foreach($days as $day)
                  @if($day->id==3)
                  <td class="pt-3-half" contenteditable="true">
                 {{$day->day}} 
                </td>
                 @endif
                  @endforeach
                  <td class="pt-3-half" contenteditable="true">
                      <div>
                     <label for="area">{{ __('Area') }}</label> 
                     {{$sched->area->name}}
                  </div>
                  <div>
                    <label for="category">{{ __('Category') }}</label>
                     {{$sched->category->name}}
                  </div>
                  </td>

                  @elseif($sched->weekdays_id==4)
                  
                  @foreach($days as $day)
                  @if($day->id=4)
                  <td class="pt-3-half" contenteditable="true">
                 {{$day->day}} 
                </td>
                 @endif
                  @endforeach
                  <td class="pt-3-half" contenteditable="true">
                      <div>
                     <label for="area">{{ __('Area') }}</label> 
                     {{$sched->area->name}}
                  </div>
                  <div>
                    <label for="category">{{ __('Category') }}</label>
                     {{$sched->category->name}}
                  </div>
                  </td>

                  @elseif($sched->weekdays_id==5)
                  
                  @foreach($days as $day)
                  @if($day->id==5)
                  <td class="pt-3-half" contenteditable="true">
                 {{$day->day}} 
                </td>
                 @endif
                  @endforeach
                  <td class="pt-3-half" contenteditable="true">
                      <div>
                     <label for="area">{{ __('Area') }}</label> 
                     {{$sched->area->name}}
                  </div>
                  <div>
                    <label for="category">{{ __('Category') }}</label>
                     {{$sched->category->name}}
                  </div>
                  </td>

                  @elseif($sched->weekdays_id==6)
                  
                  @foreach($days as $day)
                  @if($day->id==6)
                  <td class="pt-3-half" contenteditable="true">
                 {{$day->day}} 
                </td>
                 @endif
                  @endforeach
                  <td class="pt-3-half" contenteditable="true">
                      <div>
                     <label for="area">{{ __('Area') }}</label> 
                     {{$sched->area->name}}
                  </div>
                  <div>
                    <label for="category">{{ __('Category') }}</label>
                     {{$sched->category->name}}
                  </div>
                  </td>
                  @endif
                
                </tr>
                @endif
                @endif
                @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Editable table -->
@endsection