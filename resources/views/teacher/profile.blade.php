@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <img src="{{ Auth::guard('teacher')->user()->photo ?? asset('assets/image/default-profile.png') }}" alt="Profile Image" class="rounded-circle border mb-2" width="150" height="150">
                    <h3>Welcome, {{ Auth::guard('teacher')->user()->name }}</h3>
                    <p>Email: {{ Auth::guard('teacher')->user()->email }}</p>

                    <p class="mt-3">Your Role:
                        <strong>{{ Auth::guard('teacher')->user()->role ?? 'student' }}</strong>
                    </p>

                    <form action="{{ route('logout.teacher') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
                <div>
                    <a href="#" class="btn btn-success">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
