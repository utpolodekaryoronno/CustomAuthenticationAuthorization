@extends('layouts.app')

@section('title', 'Profile Edit')

@section('content')
<div class="row justify-content-center">
    <div class="card col-md-6 mx-auto">
        <div class="d-flex justify-content-between card-header align-items-center pt-3 pb-3 w-100">
            <a href="{{ route('profile.staff') }}" class="btn btn-dark">Back</a>
            <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('update.staff') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $staff->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ old('phone', $staff->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                @if($staff->photo)
                    <div class="mb-3">
                        <img src="{{ asset('media/staff/'.$staff->photo)}}" width="100" height="100"
                            class="rounded-circle mb-3" alt="Profile Photo">
                    </div>
                @else
                    <img src="{{ asset('assets/image/default-profile.png') }}" alt="Default" width="100" class="rounded-circle mb-3">
                @endif

                <button class="btn btn-primary w-100">Update Profile</button>
            </form>

        </div>
    </div>
</div>
@endsection
