@extends('auth.app')
<style>
	body {
		margin: 0;
		padding: 0;
		font-family: 'Poppins', sans-serif;
	}

	body:before {
		content: '';
		position: fixed;
		width: 100vw;
		height: 100vh;
		background-image: url(https://media.gettyimages.com/photos/sleek-red-bus-picture-id173002523?k=20&m=173002523&s=612x612&w=0&h=zueVdzDHqHVPNdqDTQ_LTKlH-VrDYfYJt0HPhMU7Z5c=);
		background-position: center center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		-webkit-background-size: cover;
		background-size: cover;
		-webkit-filter: blur(10px);
		-moz-filter: blur(10px);
		filter: blur(10px);
	}

	.contact-form {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 500px;
		height: 385px;
		padding: 80px 40px;
		background: rgba(0, 0, 0, 0.5);
	}

	.avatar {
		position: absolute;
		width: 80px;
		height: 80px;
		border-radius: 50%;
		overflow: hidden;
		top: calc(-80px/2);
		left: 211px;
	}

	.contact-form h2 {
		margin: 0;
		padding: 0 0 20px;
		color: #fff;
		text-align: center;
		text-transform: uppercase;
	}

	.contact-form p {
		margin: 0;
		padding: 0;
		font-weight: bold;
		color: #fff;
	}

	.contact-form input {
		width: 100%;
		margin-bottom: 20px;
	}

	.contact-form input[type=email],
	.contact-form input[type=password] {
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
		font-size: 16px;
	}

	.contact-form input[type=submit] {
		height: 30px;
		color: #fff;
		font-size: 15px;
		background: red;
		cursor: pointer;
		border-radius: 25px;
		border: none;
		outline: none;
		margin-top: 15%;
	}

	.contact-form a {
		color: #fff;
		font-size: 14px;
		text-decoration: none;
	}

	input[type=checkbox] {
		width: 20%;
	}
</style>

<body>
	<div class="contact-form">
		<img alt="" class="avatar" src="https://i.postimg.cc/zDyt7KCv/a1.jpg">
		<h2>ĐĂNG NHẬP ADMIN</h2>
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<div class="form-group row">
				<label style="color: white;font-weight: bold;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tên đăng nhập')
                                    }}</label>
				<div class="col-md-8">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="form-group row">
				<label style="color: white;font-weight: bold;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu')
                                    }}</label>
				<div class="col-md-8">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div style="margin-left: -19px;" class="col-md-12 d-flex">
				<div class="col-md-6" style="margin-left: 165px;">
					<input style="width: 19px;" class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>
					<label style="color: white;" class="form-check-label" for="remember">
						{{ __('Nhớ mật khẩu') }}
					</label>
				</div>
				<div class="col-md-4" style="margin-left: -46px;margin-top: -7px;">
					<a class="nav-link" href="/forgot_password"> {{ __('Quên mật khẩu?') }}</a>
				</div>
			</div>
			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary" style="margin-left: -25px;width: 100%">
						{{ __('Đăng nhập') }}
					</button>
				</div>
			</div>
		</form>
	</div>
</body>