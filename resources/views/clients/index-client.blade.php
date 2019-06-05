@extends('layouts.app')

@section('content')
<div>
                                                                        


</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(!empty($failure_message))
                <div class="alert alert-danger">
                    {{$failure_message}} <a href="/user/clients/list">here</a>
                </div>
                <div></div>
                @else
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="search"
                            placeholder="Search Name/ Email" size="35"> <span class="input-group-btn">
                        </span>
                    </div>
                </form>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nipt</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        {{-- <form method="GET" action="/user/clients/{{$client->id}}"> --}}
                            {{-- @csrf --}}
                        <tr>
                            <td>{{$client->nipt}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->category->name}}</td>
                            <td><a href="/user/clients/{{$client->id}}"><input type="button" class="btn btn-dark" value="Show"></a></p></td>
                        </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                {{$clients->links()}}
        </div>
    </div>
</div>
@endsection
