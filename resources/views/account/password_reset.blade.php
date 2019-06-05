@extends('layout')
@section('title','Account')
@section('content')
<h1 class="title">{{$employee->name}} {{$employee->surname}}</h1>

    <form method="POST" action="/reset/{{employee->id}}">
        @csrf
        @method('patch')
        <label class="label" for="supplier">Password Reset </label>
        <div class="control">
        <input type="password" class="input {{$errors->has('password') ? 'is-danger' : '' }}" name="password" placeholder="Password" value="{{ $employee->password }}" >
        <input type="submit" class="button is-link" value="DONE"> 
        </div>
    </li>
