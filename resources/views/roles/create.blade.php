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
            <form action="{{route('roles.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                  </div>
                  <div class="form-group">
                    <div><strong>Permissions</strong></div>
                    @foreach ($permissions as $permission)
                        <div>
                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}">{{$permission->name}}
                        </div>
                    @endforeach

                    <div> <button type="submit" class="btn btn-primary">Submit</button> </div>
                  </div>
            </form>
        </div>
    @endsection
</body>
</html>