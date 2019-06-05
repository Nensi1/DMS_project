@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">
                <form method="POST" action="/supplier/{{$supplier->id}}">
                        @csrf
                        @method('PATCH')
                <div class="card-header">{{$supplier->name}}</div>

                <div class="card-body">
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$supplier->name}}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                            <button type="submit" class="button">Update Supplier</button>

                    </div>

                </div>
            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection