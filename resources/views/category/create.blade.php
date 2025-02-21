<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Category Name</h1>
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter Category Name">
        <button class="submit">Create</button>
    </form>
</body>
</html>
