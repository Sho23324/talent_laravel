<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Create</title>
</head>
<body>
    <h1>Create Article Name</h1>
    <form action="{{route('articles.store')}}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter Atricle Name">
        <input type="text" name="description" placeholder="Enter Article Description">
        <button class="submit">Create</button>
    </form>
</body>
</html>
