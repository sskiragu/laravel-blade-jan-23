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
    @if (session('msg'))
        <h1>{{session('msg')}}</h1>
    @endif
    <h1>Login here <span><a href="/signup">Signup here</a></span></h1>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <input type="email" name="email" placeholder="Enter emain">
        </div>
        <div>
            <input type="password" name="password" placeholder="Enter password">
        </div>
        <div>
            <input type="submit" name="login" value="Login">
        </div>
    </form>
    <a href="">Forgot password</a>
    @endsection
</body>
</html>