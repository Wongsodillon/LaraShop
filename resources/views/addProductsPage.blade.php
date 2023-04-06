<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
<style>
    .form {
        margin-top: 1.5rem;
    }
    body
    {
        padding-left: 10rem;
        padding-top: 0.5rem;
		padding-right:10rem;
		padding-bottom:5rem;
    }
</style>
</head>
<body>
	<!-- main -->
	<a href="/welcome/{{ $user->UserID }}" style="color:black; width: 20%; border:none; margin-bottom: 1.5rem;"> <i class="fas fa-shopping-cart m-1 me-md-2"></i><p class="d-none d-md-block mb-0">Back</p> </a>
	<div class="main-w3layouts wrapper">
		<h1 style="margin-bottom: 1rem;">Your Product</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<table class="table">
					<thead>
					  <tr>
						<th scope="col">Product ID</th>
						<th scope="col">Name</th>
						<th scope="col">Stock</th>
						<th scope="col">Price</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					  </tr>
					</thead>
					<tbody>
					  @foreach ($products as $p)
					  <tr>
						<td>{{ $p->ProductID }}</td>
						<td>{{ $p->ProductName }}</td>
						<td>{{ $p->ProductStock }}</td>
						<td>{{ $p->ProductPrice }}</td>
						<td><a class="btn btn-primary" href="/updateProductView/{{$p->ProductID}}" style="color: white">Edit Product</a></td>
						<td>
							<form method="POST" action="/deleteProduct/{{$p->UserID}}/{{$p->ProductID}}">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-primary">Delete</button>
							</form>
						</td>
					</tr>
					  @endforeach
					</tbody>
			
				  </table>
				  <h1 style="margin-bottom: 1rem;">Add Product</h1>
				<form action="/storeProduct/{{ $user->UserID }}" method="post" enctype="multipart/form-data" style="display:flex; flex-direction:column; width: 30%; align-items:start; margin-top: 0.5rem;">
					@csrf
					<div class="mb-3">
						<label for="" class="form-label">Name</label><br>
						<input class="form-control @error('ProductName') is-invalid @enderror" type="text" name="ProductName" placeholder="Product Name" required="" value="{{ old('ProductName') }}" style="width:80%"><br>
					</div>
					@error('ProductName')
                	<div class="alert alert-danger" role="alert">
                    	{{$message}}
                	</div>
            		@enderror
					
					<div class="mb-3">
						<label for="" class="form-label">Description</label><br>
						<textarea class="form-control @error('ProductDesc') is-invalid @enderror" placeholder="Description" name="ProductDesc" rows="3" cols="50" style="margin-bottom:1.5rem">{{old('ProductDesc')}}</textarea>
					</div>
					@error('ProductDesc')
                	<div class="alert alert-danger" role="alert">
                    	{{$message}}
                	</div>
            		@enderror

					<div class="mb-1">
						<label for="" class="form-label">Stock</label><br>
						<input class="form-control @error('ProductStock') is-invalid @enderror" type="number" name="ProductStock" value="{{ old('ProductStock') }}" placeholder="Stock" required="" style="width:80%"><br>
					</div>
					@error('ProductStock')
                	<div class="alert alert-danger" role="alert">
                    	{{$message}}
                	</div>
            		@enderror

					<div class="mb-3">
						<label for="" class="form-label">Price</label><br>
						<input class="form-control @error('ProductPrice') is-invalid @enderror" type="number" name="ProductPrice" value="{{ old('ProductPrice') }}" placeholder="Price" required="" style="width:80%"><br>
					</div>
					@error('ProductPrice')
                	<div class="alert alert-danger" role="alert">
                    	{{$message}}
                	</div>
            		@enderror

					<div class="mb-3">
						<label for="" class="form-label">Product Image</label><br>
						<input type="file" class="form-control @error('ProductImage') is-invalid @enderror" value="{{old('ProductImage')}}" name="ProductImage">
					</div>
					@error('ProductImage')
                	<div class="alert alert-danger" role="alert">
                    	{{$message}}
                	</div>
            		@enderror

					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input type="submit" value="Add Product" style="width: 30%; background-color: #0275d8; color:white; padding: 0.3rem; border:none; margin-top: 1rem;">
				</form>
			</div>
		</div>
		{{-- <input class="text" type="number" name="ProductStock" placeholder="Stock" required="" class="form" style="width:80%"><br>
                    <input class="text" type="number" name="ProductPrice" placeholder="Price" required="" class="form" style="width:80%"><br>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="productImg"> --}}

	</div>

</body>
</html>