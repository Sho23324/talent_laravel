<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    <h1>Category List</h1>

    @foreach ($categories as $data)
    <p>{{$data['id']}} : {{$data['name']}}</p>
    <a href="{{route("category.show", ['id' => $data['id']])}}">Show</a>
    @endforeach
</body>
</html>
