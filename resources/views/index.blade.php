@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- <div class="text-center pt-5">
        <h1>Welcome to Custom <br> Authentication & Authorization</h1>
        <p class="lead mt-3">Laravel 12 Breeze-style Authentication System</p>

        @if (Auth::guard('student')->user() && Auth::guard('student')->user()->role === 'student')
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success mt-3">Register</a>
        @endif

    </div> --}}

    <style>
        .hero-section {
            margin-top: -23px;
            position: relative;
            height: 90vh;
            background: url('assets/image/student-bg.png') center/cover no-repeat;
        }

        .hero-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
        }
        .hero-section .content {
            z-index: 2;
        }

    </style>

    <div class="hero-section d-flex justify-content-center align-items-center text-center">
        <div class="overlay"></div>

        <div class="content text-white position-relative">
            <h1>Welcome to Custom <br> Authentication & Authorization</h1>
            <p class="lead mt-3">Laravel 12 Breeze-style Authentication System</p>

            @if (Auth::guard('student')->user() && Auth::guard('student')->user()->role === 'student')
                <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary mt-3">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success mt-3">Register</a>
            @endif
        </div>
    </div>
@endsection
