@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    @if ($student->photo)
                        <img src="{{ asset('media/student/' .$student->photo) }}" alt="Profile Image" class="rounded-circle border mb-2" width="150" height="150">
                    @else
                        <img src="{{ asset('assets/image/default-profile.png') }}" alt="Profile Image" class="rounded-circle border mb-2" width="150" height="150">
                    @endif
                    <h3>Welcome, {{$student->name }}</h3>
                    <p>Email: {{ $student->email }}</p>

                    <p class="mt-3">Your Role:
                        <strong>{{ $student->role ?? 'student' }}</strong>
                    </p>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
                <div class="d-flex flex-column justify-content-between align-items-end">
                    <a href="{{ route('profile.edit') }}" class="btn btn-success">Edit Profile</a>
                    <form action="{{ route('profile.delete') }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">Delete Account</
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
