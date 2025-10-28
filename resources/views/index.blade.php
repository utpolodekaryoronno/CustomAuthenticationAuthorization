@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center">
        <h1>Welcome to Custom Authentication & Authorization</h1>
        <p class="lead mt-3">Laravel 12 Breeze-style Authentication System</p>

        @guest
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success mt-3">Register</a>
        @else
            <a href="{{ route('profile') }}" class="btn btn-info mt-3">Go to Profile</a>
        @endguest
    </div>
@endsection
