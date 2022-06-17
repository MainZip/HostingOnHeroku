@extends('layout.app')

@section('title')
    Register
@endsection

@section('content')
	<!-- Main Container -->
	<div class="container-fluid">
		<div class="row">
			<!-- IMAGE CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container" style="background: url('{{ asset('assets/img/bg.png') }}') center no-repeat;"></div>
			<!-- IMAGE CONTAINER END -->

			<!-- FORM CONTAINER BEGIN -->
			<div class="col-lg-6 col-md-6 infinity-form-container">
				<!-- FORM BEGIN -->
				<div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 infinity-form">
					<!-- Company Logo -->
					<div class="text-center mb-3 mt-5">
						<img src="{{ asset('assets/img/quizyquick.png') }}" width="250px">
					</div>
					<div class="text-center mb-4">
				    	<h4>Create an account</h4>
				  	</div>
					<!-- Form -->
					<form class="px-5" method="POST" action="{{ route('teacher.create') }}">
                        @csrf
						<!-- Input Box -->
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-input">
                                    <span><i class="fa fa-user"></i></span>
                                    <input type="text" name="firstname" class="@error('firstname') is-invalid @enderror" placeholder="Firstname" value="{{ old('firstname') }}" tabindex="10"required autocomplete="firstname" autofocus>
                                    @error('firstname')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-input">
                                    <input type="text" name="lastname" class="@error('lastname') is-invalid @enderror" placeholder="Lastname" value="{{ old('lastname') }}" tabindex="10"required autocomplete="lastname" autofocus>
                                    @error('lastname')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <label class="gender">Gender</label>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender" value="Male" required/>
                            <label class="form-check-label mr-2">Male</label>

                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender" value="Female" required/>
                            <label class="form-check-label">Female</label>
                            @error('gender')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" tabindex="10"required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
						</div>
                        <div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="cpassword" class="@error('password') is-invalid @enderror" placeholder="Confirm Password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
						</div>
						<!-- Register Button -->
				    	<div class="mb-3">
							<button type="submit" class="btn btn-block">Register</button>
						</div>
						<div class="text-center mb-2">
						 	<div class="text-center mb-3" style="color: #777;">or login with</div>

			        		<!-- Facebook Button -->
			        		<a href="" class="btn btn-social btn-facebook">facebook</a>

			        		<!-- Google Button -->
							<a href="" class="btn btn-social btn-google">google</a>

						</div>
						<div class="text-center mb-5" style="color: #777;">Already have an account?
							<a class="login-link" href="{{ route('teacher.login') }}">Login here</a>
				   		</div>
					</form>
				</div>
				<!-- FORM END -->
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</div>
@endsection
