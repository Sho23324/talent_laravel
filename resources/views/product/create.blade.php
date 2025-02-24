<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create New Product</h1>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter product name"><br>
        <input type="text" name="description" placeholder="Enter description"><br>
        <input type="text" name="price" placeholder="Enter price"><br>
        <button type="submit">Create</button>
    </form>
    <a href="{{route('products.index')}}">Back</a>
</body>
</html>
