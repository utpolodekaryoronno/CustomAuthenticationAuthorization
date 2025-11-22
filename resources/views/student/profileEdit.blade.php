@extends('layouts.app')

@section('title', 'Profile Edit')

@section('content')
<div class="container p4-5">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-lg border-0">
                <div class="d-flex justify-content-between card-header align-items-center pt-4  px-5 pb-4 w-100">
                    <a href="{{ route('profile') }}" class="text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i>
                        Back to Profile
                    </a>
                    {{-- <a href="{{ route('profile') }}" class="btn btn-dark">Back</a> --}}
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-user me-2 text-primary"></i> Full Name
                            </label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $student->name) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-phone me-2 text-primary"></i> Phone Number
                            </label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $student->phone) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-camera me-2 text-primary"></i>  Photo
                            </label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        @if($student->photo)
                            <div class="mb-3">
                                <img src="{{ asset('media/student/'.$student->photo)}}" width="100" height="100"
                                    class="rounded-circle mb-3" alt="Profile Photo">
                            </div>
                        @else
                            <img src="{{ asset('assets/image/default-profile.png') }}" alt="Default" width="100" class="rounded-circle mb-3">
                        @endif

                        <button class="btn btn-primary w-100"><i class="fas fa-save me-2"></i> Update Profile</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('content')


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-lg border-0">
                <!-- Header -->
                <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top">
                    <h3 class="mb-0 fw-bold">
                        <i class="fas fa-user-edit me-3"></i> Edit Profile
                    </h3>
                </div>

                <!-- Body -->
                <div class="card-body p-5">

                    <!-- Back Button -->
                    <div class="mb-4">
                        <a href="{{ route('profile') }}" class="text-decoration-none">
                            <i class="fas fa-arrow-left me-2"></i>
                            Back to Profile
                        </a>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Current Photo + Preview -->
                        <div class="text-center mb-5">
                            <div class="position-relative d-inline-block">
                                <img src="{{ $student->photo ? asset('media/student/'.$student->photo) : asset('assets/image/default-profile.png') }}"
                                     alt="Profile Photo"
                                     id="photoPreview"
                                     class="rounded-circle border border-white shadow-lg"
                                     width="150" height="150"
                                     style="object-fit: cover;">

                                <!-- Change Photo Button Overlay -->
                                <label for="photo" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-3 shadow cursor-pointer hover-scale"
                                       style="transform: translate(20%, 20%); cursor: pointer;">
                                    <i class="fas fa-camera"></i>
                                </label>
                            </div>

                            <div class="mt-3">
                                <input type="file" name="photo" id="photo" class="d-none" accept="image/*">
                                <small class="text-muted">Click the camera to change photo</small>
                            </div>
                        </div>

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-user me-2 text-primary"></i> Full Name
                            </label>
                            <input type="text" name="name" class="form-control form-control-lg"
                                   value="{{ old('name', $student->name) }}"
                                   placeholder="Enter your full name" required autofocus>
                            @error('name')
                                <small class="text-danger mt-1 d-block"><i class="fas fa-exclamation-circle"></i> {{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Phone Field -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-phone me-2 text-primary"></i> Phone Number
                            </label>
                            <input type="text" name="phone" class="form-control form-control-lg"
                                   value="{{ old('phone', $student->phone) }}"
                                   placeholder="+1234567890">
                            @error('phone')
                                <small class="text-danger mt-1 d-block"><i class="fas fa-exclamation-circle"></i> {{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Photo Upload Field (Hidden) -->
                        <input type="file" name="photo" id="photoInput" class="d-none" accept="image/*">

                        <!-- Submit Button -->
                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-lg hover-lift">
                                <i class="fas fa-save me-2"></i>
                                Update Profile
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Live Photo Preview Script -->
<script>
    document.getElementById('photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('photoPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<style>
    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(67, 97, 238, 0.3) !important;
    }
    .hover-scale {
        transition: all 0.3s ease;
    }
    .hover-scale:hover {
        transform: translate(20%, 20%) scale(1.15);
    }
    .cursor-pointer { cursor: pointer; }
</style>
@endsection --}}
