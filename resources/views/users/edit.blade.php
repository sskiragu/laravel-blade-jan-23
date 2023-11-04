<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.dashboard')
    @section('content')
    <div class="container">
        <form action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="name" id="username" value="{{$user->name}}" aria-describedby="emailHelp">
              </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="email" aria-describedby="emailHelp" placeholder="Enter new password">
            </div>
            <div class="mb-3">
              <label for="roles" class="form-label">Roles</label>
              <select class="form-select" multiple name="roles[]" id="roles" aria-label="Multiple select example">
                @foreach ($roles as $role)
                    <option value="{{$role}}">{{$role}}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>
    @endsection
</body>
</html>