@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(!empty($failure_message))
                <div class="alert alert-danger">
                    {{$failure_message}} <a href="/supplier">here</a>
                </div>
                @endif
                @if(!empty($failure_message))
                <div></div>
                @else
                <form action="supplier/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="search"
                            placeholder="Search Name" size="35"> <span class="input-group-btn">
                        </span>
                    </div>
                </form>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                        {{-- <form method="GET" action="/supplier/{{$supplier->id}}"> --}}
                            {{-- @csrf --}}
                        <tr>
                            <td>{{$supplier->name}}</td>
                            {{-- <td><input type="button" class="btn btn-dark" value="Show"></p></td> --}}
                            <td><a href="/supplier/{{$supplier->id}}"><button type="submit" class="btn btn-dark">Show</button></a></td>
                        </tr>
                        {{-- </form> --}}
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
