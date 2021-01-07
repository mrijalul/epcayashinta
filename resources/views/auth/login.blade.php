@extends('layouts.app_login')

@section('content_login')	
	<div class="limiter">
		<div class="container-login100">
			<h2 style="position: absolute;top: 15%; text-align: center;">Selamat Datang di <br> EPCA</h2>
			<div class="wrap-login100" style="padding: 150px 95px 0px 95px;">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('images/img-01.png') }}" alt="IMG">
				</div>
				
				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
					@csrf
					<span class="login100-form-title">
						Guru/Murid Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

						<input id="email" type="email" class="input100 @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>

						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">

						<input id="password" type="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					
					<div class="wrap-input100">
						<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="form-check-label" for="remember">
							{{ __('Remember Me') }}
						</label>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							{{ __('Login') }}
						</button>
					</div>

					<div class="text-center p-t-136" style="padding-top: 0;">
						<a class="txt2" href="{{ route('register') }}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection