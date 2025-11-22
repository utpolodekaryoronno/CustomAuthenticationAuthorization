@extends('layouts.app')

@section('title', 'Profile')

{{-- @section('content')
<style>
    body {
        background-color: #EEF2F7;
    }
</style>
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('dashboard') }}" class="btn btn-dark">Back</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-success">Edit Profile</a>
            </div>
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
                    <span class="hidden"></span>
                    <form action="{{ route('profile.delete') }}" method="POST" style="display: inline-block;" class="delete-form"  data-message="Are you sure you want to delete this Account?" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">Delete Account</
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
    <div class="profile-container">
        <div class="container">
            <div class="row justify irradiate-content-center">
                <div class="col-12">

                    <div class="profile-card">

                        <!-- Header with Avatar -->
                        <div class="profile-header text-center text-md-start d-flex flex-column flex-md-row align-items-center gap-4">
                            <div>
                                @if ($student->photo)
                                    <img src="{{ asset('media/student/' . $student->photo) }}"
                                        alt="{{ $student->name }}" class="profile-avatar">
                                @else
                                    <img src="{{ asset('assets/image/default-profile.png') }}"
                                        alt="Default Profile" class="profile-avatar">
                                @endif
                            </div>
                            <div class="flex-grow-1 text-center text-md-start">
                                <h1 class="profile-name mb-0">{{ $student->name }}</h1>
                                <p class="profile-role mt-2">
                                    <i class="fas fa-user-graduate me-2"></i>
                                    {{($student->role ?? 'Student') }}
                                </p>
                            </div>
                        </div>

                        <!-- Body with Info -->
                        <div class="profile-body">

                            <div class="info-grid">
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-envelope text-primary me-2"></i>Email Address
                                    </div>
                                    <div class="info-value">{{ $student->email }}</div>
                                </div>


                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-user-tag text-primary me-2"></i>Username
                                    </div>
                                    <div class="info-value">{{ $student->username }}</div>
                                </div>


                                @if($student->phone)
                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-phone text-primary me-2"></i>Phone Number
                                    </div>
                                    <div class="info-value">{{ $student->phone }}</div>
                                </div>
                                @endif

                                <div class="info-item">
                                    <div class="info-label">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>Member Since
                                    </div>
                                    <div class="info-value">
                                        {{ $student->created_at->format('F j, Y') }}
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <a href="{{ route('dashboard') }}" class="btn btn-custom btn-back">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                                </a>

                                <a href="{{ route('profile.edit') }}" class="btn btn-custom btn-edit">
                                    <i class="fas fa-user-edit me-2"></i> Edit Profile
                                </a>

                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-custom btn-logout">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>

                                <form action="{{ route('profile.delete') }}" method="POST"
                                    class="delete-form"  data-message="Are you sure you want to delete this Account?">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-custom btn-delete">
                                        <i class="fas fa-trash-alt me-2"></i> Delete Account
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
