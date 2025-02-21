<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    <h1>Category List</h1>
    <a href="{{route('category.create')}}">+Create</a>
    @foreach ($categories as $data)
    <p>{{$data['id']}} : {{$data['name']}}</p>
    <a href="{{route("category.show", ['id' => $data['id']])}}">Show</a>
    <a href="{{route('category.edit', ['id'=>$data['id']])}}">Edit</a>

    <form action="{{route('category.delete', ['id' => $data['id']])}}" method="POST">
        @csrf
        <button type="submit">Delete</button>
    </form>
    @endforeach
</body>
</html>
