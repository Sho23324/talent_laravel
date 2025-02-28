<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('users.update', $user->id)}}" method="POST">
        @csrf
        {{method_field('PUT')}}
        <input type="text" name="name" placeholder="Enter Your Name" value="{{$user['name']}}"><br>
        <input type="email" name="email" placeholder="Enter Your Email" value="{{$user['email']}}"><br>
        <input type="text" name="password" placeholder="Enter Your Password" value="{{$user['password']}}"><br>
        <input type="text" name="password_confirmation" placeholder="Confirm Your Password" value="{{$user['password']}}"><br>
        <input type="text" name="address" placeholder="Enter Your Address" value="{{$user['address']}}"><br>
        <input type="text" name="phone" placeholder="Enter Your Phone" value="{{$user['phone']}}"><br>
        <input type="text" name="gender" placeholder="Enter Your Gender" value="{{$user['gender']}}"><br>
        <input type="submit" value="UPDATE">
    </form><br>
    <a href="{{route('users.index')}}">
        BACK
    </a>
</body>
</html>
