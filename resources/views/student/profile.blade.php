@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Welcome, {{ Auth::guard('student')->user()->name }}</h3>
        <p>Email: {{ Auth::guard('student')->user()->email }}</p>

        <p class="mt-3">Your Role:
            <strong>{{ Auth::guard('student')->user()->role ?? 'student' }}</strong>
        </p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
@endsection
