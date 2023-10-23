<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .top-nav li{
            display: inline;
        }
    </style>
</head>
<body>
    {{-- Navigation --}}
    <div class="top-nav">
        <li><a href="/">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Services</a></li>
        <li><a href="/login">Login</a></li>
        <li><a href="/signup">Signup</a></li>
    </div>

    {{-- Main Content --}}

    @yield('content')

    @yield('sidebar')

    {{-- Footer --}}
    <div>
        <h1>My Footer</h1>
    </div>
</body>
</html>