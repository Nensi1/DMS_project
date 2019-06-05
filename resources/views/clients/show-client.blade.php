@extends('layouts.app')

@push('scriptArea')
<script src="{{ asset('js/area.js')}}"></script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">
                
                <div class="card-header">
                <div class="field">
                        <form method="GET" action="/user/clients/{{$client->id}}/edit">
                            @csrf
                            <div class="control">
                                <button type="submit" class="btn btn-outline-primary">Edit Client</button>
                            </div>
                        </form>
                </div></div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                            <th scope="row">{{ __('NIPT') }}</th>
                            <td>{{$client->nipt}}</td>
                            </tr>
                            
                            <tr>
                            <th scope="row">{{ __('Name') }}</th>
                            <td>{{ $client->name}}</td>
                            </tr>
                            
                            <tr>
                            <th>{{__('E-Mail Address') }}</th>
                            <td>{{ $client->email}}</td>
                            </tr>

                            <tr>
                            <th>{{__('Phone Number') }}</th>
                            <td>{{ $client->phone}}</td>
                            </tr>

                            <tr>
                            <th>{{__('Address') }}</th>
                            <td>{{ $client->address}}</td>
                            </tr>
        
                            <tr>
                            <th>{{__('Area') }}</th>
                            <td>{{ $client->area->name}}</td>
                            </tr>
                            
                            <tr>
                            <th>{{__('City') }}</th>
                            <td>{{ $client->city}}</td>
                            </tr>
                            
                            <tr>
                            <th>{{__('Category') }}</th>
                            <td>{{ $client->category->name}}</td>
                            </tr>

                        </tbody>
                    </table>
                        <form method="POST" action="/user/clients/{{$client->id}}">
                            @csrf
                            @method('DELETE')
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="btn btn-outline-danger">Delete Client</button>
                                </div>
                    
                            </div>
                        
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection