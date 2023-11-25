<!doctype html>
<html lang="en">
<head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset("import/login/css/style.css") }}">
</head>
<body class="img js-fullheight" style="background-image: url({{ asset("import/login/images/utm.jpg") }})">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sistem Informasi Pengajuan KP</h2>
				</div>
			</div>

            @if(session()->has('wrong'))
            <div style="display: flex; justify-content: center; align-items:center;">
                <div class="alert alert-danger " role="alert" style="text-align:center; width: 350px">
                    {{ session('wrong') }}
                </div>
            </div>
            @endif

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="/succesLogin" method="post" class="signin-form" sty>
                    @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="id" placeholder="enter your nim/nip ..." required>
		      		</div>
                    <div class="form-group">
                        <input id="password-field" type="password" name="password" class="form-control" placeholder="enter your password ..." required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                    </div>
                    {{-- <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="#" style="color: #fff">Forgot Password</a>
                        </div>
                    </div> --}}
                </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset("import/login/js/jquery.min.js") }}"></script>
    <script src="{{ asset("import/login/js/popper.js") }}"></script>
    <script src="{{ asset("import/login/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("import/login/js/main.js") }}"></script>

</body>
</html>

