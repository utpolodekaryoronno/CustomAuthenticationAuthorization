@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<style>
    body {
        background-color: #EEF2F7;
    }
</style>
<div class="container">
    <div class="col-md-8 mx-auto">
        <a href="{{ route('dashboard.teacher') }}" class="btn btn-dark mb-3">Back</a>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @if (Auth::guard('teacher')->user()->photo)
                            <img src="{{ asset('media/teacher/' . Auth::guard('teacher')->user()->photo) }}" alt="Teacher Profile" class="rounded-circle border mb-2" width="150" height="150">
                        @else
                            <img src="{{ asset('assets/image/default-profile.png') }}" class="rounded-circle border mb-2" alt="Default" width="150" height="150">
                        @endif
                        <h3>Welcome, {{ Auth::guard('teacher')->user()->name }}</h3>
                        <p>Email: {{ Auth::guard('teacher')->user()->email }}</p>

                        <p class="mt-3">Your Role:
                            <strong>{{ Auth::guard('teacher')->user()->role ?? 'student' }}</strong>
                        </p>

                        <form action="{{ route('logout.teacher') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        <form action="{{ route('delete.teacher') }}" method="POST" class="mt-2 delete-form"  data-message="Are you sure you want to delete this Account?">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('edit.teacher') }}" class="btn btn-success">Edit Profile</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
