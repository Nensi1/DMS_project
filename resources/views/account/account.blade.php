@extends('layout')
@section('title','Account')
@section('content')
<h1 class="title">{{$employee->name}} {{$employee->surname}}</h1>
<ul>
    <li>Email: {{$employee->email}}</li>
    <li>Phone Number: {{$employee->phone number}}</li>
    <li>Passport ID: {{$employee->passport_id}} </li>
    <li>Category: {{$employee->category}}</li>
    <li>Username: {{$employee->username}}</li>
    <li><a href="/reset/{{$employee->id}}"><input type="submit" class="button is-link" value="RESET PASSWORD"></a>
    </li>
<ul>