<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
    <h1>Category show</h1>
    <p>{{$category['name']}}</p>
    <a href="{{route ("category.list")}}">Back</a>
</body>
</html>
