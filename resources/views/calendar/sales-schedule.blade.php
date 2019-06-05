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
        <div class="card-header" style="background: #2e6da4;color: white;"><h4>{{ __('TO DO LIST') }}</h4> <i>today: {{$now}}</i>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            @if(Auth::user()->hasPosition('Sales Agent')==false)
                            <th scope="col">Agent</th>
                            @endif
                            <th scope="col">Category</th>
                            <th scope="col">Client</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Visit</th>
                            <th scope="col">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <?php $clients=$task->getClient($task->category_id,$task->area_id)?>
                            {{-- @if($clients->get()==null)
                            <div class="alert alert-success">
                            NO TASKS AVAILABLE                             
                            </div>
                            @break
                            @else --}}
                            <tr class="table">
                                    <th scope="row">⚬</th>
                            @if(Auth::user()->hasPosition('Sales Agent')==false)
                            <td><a href="/user/{{$task->user->id}}">{{$task->user->name}}</a></td>
                            @endif
                            <td>{{$task->category->name}}</td>
                            <td>{{$task->client->name}}</td>
                            <td>{{$task->client->address}}</td>
                            <td>{{$task->client->city}}</td>
                            <td>{{$task->client->phone}}</td>
                            @if($task->status=="Visited")
                            <td>
                                <div class="control">
                                       <img src="https://s3.amazonaws.com/peoplepng/wp-content/uploads/2018/06/06125806/Green-Tick-PNG-Transparent-Image.png" width="30pt;">
                                </div>
                            </td>
                                @else
                                <td><label class="badge badge-warning"><b>{{$task->status}}</b></label></td>
                                @endif
                                <td>
                                        <form method="POST" action="/tasks/todo/{{ $task->id }}">
                                        @method('PATCH')
                                        @csrf
                                            <label class="checkbox {{ $task->status=="Visited" ? 'is-complete' : ''}}" for="completed">
                                                <input  type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->status=="Visited" ? 'checked' : ''}}> 
                                            </label>
                                        </form>
                                </td>
                                @if($task->report!=null)
                                <td>
                                <div class="control">
                                    <button type="submit" class="btn btn-outline-success"data-toggle="modal" data-target="#test{{$loop->index}}"> {{ __('Check Report') }}</button>
                                </div>
                                <div class="modal" tabindex="-1" role="dialog" id="test{{$loop->index}}">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title"><br/><h3>Report</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="comment" id="message-text">{{$task->report}}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                </div> 
                            </td> 
                            @else
                            <td>
                                  
                                    <div class="control">
                                        <button type="submit" class="btn btn-outline-primary"data-toggle="modal" data-target="#report{{$loop->index}}"> {{ __('Create Report') }}</button>
                                    </div>
                                    <form method="POST" action="/tasks/todo/update/{{ $task->id }}"> 
                                        @method('PATCH')
                                        @csrf
                                    <div class="modal" tabindex="-1" role="dialog" id="report{{$loop->index}}">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title"><br/><h3>Report</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="report" id="message-text">{{$task->report}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">COMPLETE TASK</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </form>
 
                                </td>
                                 
                                @endif
                            <td>
                                <form method="POST" action="{{route('task.delete', ['task'=>$task->id])}}">{{--  --}}
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="field">
                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </form>
                            </tr>
                      {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection