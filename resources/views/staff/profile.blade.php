@extends('layouts.app')

@section('title', 'Profile')
<style>
    body {
        background-color: #EEF2F7;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <a href="{{ route('staff.dashboard') }}" class="btn btn-dark mb-4">Back</a>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            @if (Auth::guard('staff')->user()->photo)
                                <img src="{{ asset('media/staff/' . Auth::guard('staff')->user()->photo) }}" alt="Profile Image" class="rounded-circle border mb-2" width="150" height="150">
                            @else
                                <img src="{{ asset('assets/image/default-profile.png') }}" alt="Default Profile Image" class="rounded-circle border mb-2" width="150" height="150">
                            @endif

                            <h3>Welcome, {{ Auth::guard('staff')->user()->name }}</h3>
                            <p>Email: {{ Auth::guard('staff')->user()->email }}</p>

                            <p class="mt-3">Your Role:
                                <strong>{{ Auth::guard('staff')->user()->role ?? 'student' }}</strong>
                            </p>

                            <form action="{{ route('logout.staff') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>

                            <form action="{{ route('delete.staff') }}" method="POST" class="mt-2 delete-form"  data-message="Are you sure you want to delete this Account?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Account</button>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('edit.staff') }}" class="btn btn-success">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
