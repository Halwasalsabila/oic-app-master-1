<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Aset-OIC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/oic-icon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('login')}}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @error('error')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('login')}}/images/oic-icon.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{ route('actionlogin') }}" method="post">
                    @csrf
					<span class="login100-form-title">
						Login Aset-YOSL OIC
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: Oic">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button  type="submit"  class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="#">
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ asset('login')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('login')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login')}}/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>