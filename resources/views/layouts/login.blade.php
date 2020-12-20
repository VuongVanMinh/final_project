<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/styleLogin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-4"></div>
			
			<div class="col-md-4 block"  id="title" >
				
				<h2>Login Now</h2>
				<hr>
				@if(isset($error) == 1)
					<div class="error">Wrong email or password.<br> Try again, please!</div>
				@endif
				<form action="{{ route('login')}}" method="POST" >
					{{ csrf_field() }}
					<div class="form-group">
						<label for="exampleInputEmail1" class="text-uppercase">Email</label>
						<input type="email" class="form-control" name="email" placeholder="">
					</div>
					<div class="form-group">
					    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
					    <input type="password" name="password" class="form-control" placeholder="">
					</div>
					<div class="form-check">
					    <!-- <label class="form-check-label">
					      <input type="checkbox" class="form-check-input tick">
					      <small>Remember Me</small>
					    </label> -->
					    <button type="submit" class="btn btn-outline-dark float-right size-btn">Login</button>
					 </div>
					 <div class="form-group">
					 	<div class="hagd">Have a good day!!!</div>
					 </div>
				</form>
			</div>
		</div>
	</div>
	<div id='stars'></div>
	<div id='stars2'></div>
	<div id='stars3'></div>
    
	<script type="text/javascript" src="{{asset('resources/js/jquery-3.2.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>