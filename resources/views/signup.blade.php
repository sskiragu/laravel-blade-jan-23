<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@extends('layouts.default')

@section('content')
<h1>Signup here <span><a href="/login">Login</a></span></h1>

{{-- @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach --}}

<form action="/signup" method="post">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Enter username">
        @if ($errors->has('name'))
            <span>{{$errors->first('name')}}</span>
        @endif
    </div>
    <div>
        <input type="email" name="email" placeholder="Enter emain">
        @if ($errors->has('email'))
            <span>{{$errors->first('email')}}</span>
        @endif
    </div>
    <div>
        <input type="password" name="password" placeholder="Enter password">
        @if ($errors->has('password'))
            <span style="color: red;">{{$errors->first('password')}}</span>
        @endif
    </div>
    <div>
        <input type="submit" name="signup" value="Signup">
    </div>
</form>
@endsection
</body>
</html>