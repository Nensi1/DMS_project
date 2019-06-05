@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <HR>
            <div class="card">
                <form method="POST" action="/user/{{$user->id}}">
                        @csrf
                        @method('PATCH')
                <div class="card-header">{{$user->name}}</div>

                <div class="card-body">
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                    <div class="col-md-6">
                        <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $user->surname}}" required autofocus>

                        @if ($errors->has('surname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

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
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}" required>

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('Passport Nr') }}</label>

                    <div class="col-md-6">
                        <input id="passpot" type="text" class="form-control{{ $errors->has('passport') ? ' is-invalid' : '' }}" name="passport" value="{{ $user->passport }}" required>

                        @if ($errors->has('passport'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('passport') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                    <div class="col-md-6">
                        <select name="position" class="form-control" id="position">
                            <option value="">@foreach ($user->positions as $position)
                                    <p>{{ $position->title }}</p>
                                            @endforeach
                                    </option>
                                @foreach ($positions as $pos) 
                                        <option>{{ $pos->title }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="wage" class="col-md-4 col-form-label text-md-right">{{ __('Wage') }}</label>

                    <div class="col-md-6">
                        <input id="wage" type="text" class="form-control{{ $errors->has('wage') ? ' is-invalid' : '' }}" name="wage" value="{{ $user->wage }}" required>

                        @if ($errors->has('wage'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('wage') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    


                    
                <div class="field">
                    <div class="control">
                            <button type="submit" class="button">Update Employee</button>

                    </div>

                </div>
            </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection