<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{route('products.update', ['id'=>$product['id']])}}" method="POST">
        @csrf
        Name : <input type="text" name="name" value="{{$product['name']}}"><br>
        Description : <input type="text" name="description" value="{{$product['description']}}"><br>
        Price : <input type="text" name="price" value="{{$product['price']}}"><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{route('products.index')}}">Back</a>
</body>
</html>
