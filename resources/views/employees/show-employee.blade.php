@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">

            <div class="card-header">
                <div class="field">
                        <form method="GET" action="/user/{{$user->id}}/edit">
                            @csrf
                            <div class="control">
                                <button type="submit" class="btn btn-outline-primary">Edit Employee</button>
                            </div>
                        </form>
                </div></div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                            <th scope="row">{{ __('Name') }}</th>
                            <td>{{ $user->name}}</td>
                            </tr>

                            <tr>
                            <th scope="row">{{ __('Surname') }}</th>
                            <td>{{ $user->surname}}</td>
                            </tr>
                                    
                            <tr>
                            <th>{{__('E-Mail Address') }}</th>
                            <td>{{ $user->email}}</td>
                            </tr>

                            <tr>
                            <th>{{__('Phone Number') }}</th>
                            <td>{{ $user->phone}}</td>
                            </tr>

                            <tr>
                            <th>{{__('Passport Number') }}</th>
                            <td>{{ $user->passport}}</td>
                            </tr>
                            
                            <tr>
                            <th>{{__('Position') }}</th>
                            <td>@foreach ($user->positions as $position)
                                    <p>{{ $position->title }}</p>
                                @endforeach</td>
                            </tr>

                            <tr>
                            <th>{{__('Wage') }}</th>
                            <td>{{ $user->wage}}</td>
                            </tr>

                        </tbody>
                    </table>
                        <form method="POST" action="/user/{{$user->id}}">
                            @csrf
                            @method('DELETE')
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="btn btn-outline-danger">Delete Employee</button>
                                </div>
                    
                            </div>
                        
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection