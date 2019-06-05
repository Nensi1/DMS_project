@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">

            <div class="card-header">
                <div class="field">
                        <form method="GET" action="/supplier/{{$supplier->id}}/edit">
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
                            <td>{{ $supplier->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                        <form method="POST" action="/supplier/{{$supplier->id}}">
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