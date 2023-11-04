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
            <div>
                <a href="{{route('roles.create')}}" class="btn btn-outline-success">Create New Role <i class="bi bi-plus"></i></a>
            </div>
            <div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$role->name}}</td>
                                <td>Show</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div>
    @endsection
</body>
</html>