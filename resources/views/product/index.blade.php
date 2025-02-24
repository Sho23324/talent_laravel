<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product List</h1>
    <a href="{{route('products.create')}}">+Create</a>
    @foreach ($products as $product)
        <p>{{$product['id']}} : {{$product['name']}}</p>
        <a href="{{route('products.detail', ['id'=>$product['id']])}}">Show</a>
        <a href="{{route('products.edit', ['id'=>$product['id']])}}">Edit</a>
        <a href="{{route('products.delete', ['id'=>$product['id']])}}">Delete</a>
    @endforeach
</body>
</html>
