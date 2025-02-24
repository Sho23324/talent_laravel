<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Articles</h1>
    <a href="{{route('articles.create')}}">+Create</a>
    @foreach($articles as $data)
        <p>{{$data['id']}} . {{$data['title']}} . {{$data['description']}}</p>
    @endforeach
</body>
</html>
