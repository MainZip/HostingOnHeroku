@extends('layout.app')

@section('title')
    Login
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- IMAGE CONTAINER BEGIN -->
        <div class="col-lg-6 col-md-6 d-none d-md-block infinity-image-container" style="background: url('{{ asset('assets/img/bg.png') }}') center no-repeat;"></div>
        <!-- IMAGE CONTAINER END -->

        <!-- FORM CONTAINER BEGIN -->
        <div class="col-lg-6 col-md-6 infinity-form-container">
            <div class="col-lg-9 col-md-12 col-sm-8 col-xs-12 infinity-form">
                <!-- Company Logo -->
                <div class="text-center mb-3 mt-5">
                    <img src="{{ asset('assets/img/quizyquick.png') }}" width="250px">
                </div>
                <div class="text-center mb-4">
                    <h4>Login into account</h4>
                </div>
                <!-- Form -->
                <form class="px-5" action="{{ url('teacher/check') }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <!-- Input Box -->
                    <div class="form-input">
                        <span><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" tabindex="10" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                         @enderror
                    </div>
                    <div class="form-input">
                        <span><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <!--Remember Checkbox -->
                        <div class="col-auto d-flex align-items-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" id="cb1" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="cb1">Remember me</label>
                            </div>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-block">Login</button>
                    </div>

                    <!-- Forget Password -->
                    <div class="text-right mb-2">
                        @if (Route::has('password.request'))
                            <a class="forget-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="text-center mb-2">
                        <div class="text-center mb-3" style="color: #777;">or login with</div>

                        <!-- Facebook Button -->
                        <a href="" class="btn btn-social btn-facebook">facebook</a>

                        <!-- Google Button -->
                        <a href="" class="btn btn-social btn-google">Google</a>

                    </div>

                    <div class="text-center mb-5" style="color: #777;">Don't have an account?
                        <a class="register-link" href="{{ route('teacher.register') }}">Register here</a>
                    </div>
                </form>
            </div>
            <!-- FORM END -->
        </div>
        <!-- FORM CONTAINER END -->
    </div>
</div>
@endsection
