@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4 text-center">Login Student</h2>
            <div class="card mb-4">
                <div class="card-body">


                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="mb-3 position-relative">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control pe-5" id="password">
                            <i class="fa fa-eye position-absolute bottom-0 end-0 translate-middle-y me-3 toggle-password"
                            data-target="#password" style="cursor: pointer;"></i>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                            {{-- <a href="{{ route('password.request') }}">Forgot Password?</a> --}}
                            <a href="">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        <p>Or login with</p>

                        {{-- <a href="{{ route('auth.google.redirect') }}" class="btn btn-outline-dark w-100 mb-2">
                            <i class="fab fa-google"></i> Continue with Google
                        </a> --}}
                        <a href="" class="btn btn-outline-dark w-100 mb-2">
                            <i class="fab fa-google"></i> Continue with Google
                        </a>

                        {{-- <a href="{{ route('auth.facebook.redirect') }}" class="btn btn-outline-primary w-100">
                            <i class="fab fa-facebook"></i> Continue with Facebook
                        </a> --}}
                        <a href="" class="btn btn-outline-primary w-100">
                            <i class="fab fa-facebook"></i> Continue with Facebook
                        </a>
                    </div>

                    <p class="text-center mt-3">
                        Don't have an account? <a href="{{ route('register') }}">Register</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
