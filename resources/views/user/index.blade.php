<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>User</h1>
    <a href="{{route('users.create')}}"> + CREATE</a> <br><br>
    @foreach ($users as $user)
        name : {{$user['name']}} <br>
        email :{{$user['email']}} <br>
        phone : {{$user['phone']}} <br>
        address : {{$user['address']}} <br>
        gender : {{$user['gender']}} <br>
        password : {{$user['password']}} <br>
    <div class="" style="display: flex;">
        <form action="{{route('users.destroy', $user->id)}}" method="POST" style="margin-right: 10px">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit">DELETE</button>
        </form>
        <div class="">
            <a href="{{route('users.edit', $user->id)}}">UPDATE</a>
        </div>

    </div>
    <br><br>
    @endforeach
</body>
</html>
