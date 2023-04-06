<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            padding-top: 10rem;
            padding-left: 10rem;
        }
    </style>
</head>
<body>
    <h1 style="margin-bottom: 2rem;">Update Product {{ $product->ProductName }}</h1>
    <form action="/update/{{$product->UserID}}/{{ $product->ProductID }}" method="POST" enctype="multipart/form-data" style="display:flex; flex-direction:column; width: 30%; align-items:start; margin-top: 0.5rem;">
        @csrf
        @method('PATCH')
        <input class="text" type="text" name="ProductName" value="{{ $product->ProductName }}" placeholder="Product Name" required="" class="form" style="width:80%"><br>
        <textarea class="text" placeholder="Description" name="ProductDesc" rows="3" cols="50" style="margin-bottom:1.5rem">{{$product->ProductDescription}}</textarea>
        <input class="text" type="number" name="ProductStock" value="{{$product->ProductStock}}" placeholder="Stock" required="" class="form" style="width:80%"><br>
        <input class="text" type="number" name="ProductPrice" value="{{$product->ProductPrice}}" placeholder="Price" required="" class="form" style="width:80%"><br>
        <div class="wthree-text">
            <div class="clear"> </div>
        </div>
        <input type="submit" value="Update Product" style="width: 30%; background-color: #0275d8; color:white; padding: 0.3rem; border:none; margin-top: 1rem;">
    </form>
</body>
</html>