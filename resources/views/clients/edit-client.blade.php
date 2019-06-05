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
                <form method="POST" action="/user/clients/{{$client->id}}">
                        @csrf
                        @method('PATCH')
                <div class="card-header">{{$client->name}}</div>

                <div class="card-body">
                        <div class="form-group row">
                            <label for="nipt" class="col-md-4 col-form-label text-md-right">{{ __('NIPT') }}</label>
    
                            <div class="col-md-6">
                                <input id="nipt" type="text" class="form-control{{ $errors->has('nipt') ? ' is-invalid' : '' }}" name="nipt" value="{{$client->nipt}}" required autofocus>

                                @if ($errors->has('nipt'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nipt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $client->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $client->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $client->phone }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $client->address }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>
                            <div class="col-md-3">
                                <select name="area" class="form-control" id="area">
                                    <option value="{{ $client->area->name }}">{{$client->area->name}}</option>
                                        @foreach ($areas as $area) 
                                            <option>{{ $area->name }}</option>
                                        @endforeach
                                </select>
                                <input type="text" class="hidden-textbox" name="area-txt" 
                                id="area-txt" hiden>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $client->city }}" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select name="category" class="form-control" id="category">
                                    <option value="{{ $client->category->name }}">{{ $client->category->name }}</option>
                                        @foreach ($category as $categ) 
                                            <option>{{ $categ->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button">Update Client</button>
                            </div>
                        </div>
                        </form>
                
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection