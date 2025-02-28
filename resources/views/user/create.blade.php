<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
    @foreach($errors->all() as $error)
        <div>
            {{$error}}
        </div>
    @endforeach
    @endif
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter Your Name"><br>
        <input type="email" name="email" placeholder="Enter Your Email"><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
        <input type="password" name="password_confirmation" placeholder="Enter Your Password"><br>
        <input type="text" name="address" placeholder="Enter Your Address"><br>
        <input type="text" name="phone" placeholder="Enter Your Phone"><br>
        <input type="text" name="gender" placeholder="Enter Your Gender"><br>
        <input type="submit" value="CREATE">
    </form><br>
    <a href="{{route('users.index')}}">
        BACK
    </a>
</body>
</html>
