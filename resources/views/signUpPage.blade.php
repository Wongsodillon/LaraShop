<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Sign Up to LaraShop</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
<style>
    .form {
        margin-top: 1.5rem;
    }
    body
    {
        padding-left: 20rem;
        padding-top: 10rem;
    }
</style>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1 style="margin-bottom: 0.5rem;">Sign Up to LaraShop</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="/register" method="post" style="display:flex; flex-direction:column; width: 30%; align-items:start; margin-top: 0.5rem;">
					@csrf
                    <input class="text" type="text" name="username" placeholder="Username" required="" class="form" style="width:80%"><br>
					<input class="text" type="email" name="email" placeholder="Email" required="" class="form" style="width:80%"><br>
					<input class="text" type="password" name="password" placeholder="Password" required="" class="form" style="width:80%"><br>
					<div class="wthree-text">
						<div class="clear"> </div>
					</div>
					<input type="submit" value="Sign Up" style="width: 30%; background-color: #0275d8; color:white; padding: 0.3rem; border:none;">
				</form>
				<p>Have an Account? <a href="/"> Login Now!</a></p>
			</div>
		</div>
		

	</div>

</body>
</html>