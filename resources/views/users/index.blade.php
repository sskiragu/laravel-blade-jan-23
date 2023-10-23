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
        <div class="container-fluid">
            <div>
                <a href="" class="btn btn-outline-success"><i class="bi bi-plus"></i></a>
            </div>
        </div>
        <div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><i class="bi bi-pencil-square btn btn-outline-success"></i></td>
                            <td><i class="bi bi-trash3 btn btn-outline-danger"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</body>
</html>