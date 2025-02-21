<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product Details</h1>
    <p>name : {{$product['name']}} <br> Description :  {{$product['description']}} <br> Price : {{$product['price']}}</p>
    <a href="{{route("product.index")}}">Back</a>
</body>
</html>
