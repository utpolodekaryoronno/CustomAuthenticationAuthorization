@extends('layouts.app')

@section('title', 'Home')


@section('content')
    <div class="hero-section">
        <div class="overlay"></div>

        <div class="content text-white position-relative">
                <div class="text-center mb-5 pt-5">
                    <h1 class="fw-bold">Welcome to School Portal</h1>
                    <p>Please select your role to continue</p>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Student -->
                    <div class="col-md-3">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-lg rounded-4 text-center p-4 hover-lift h-100">
                                <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
                                    <i class="fas fa-user-graduate fa-2x"></i>
                                </div>
                                <h5 class="fw-bold">Student</h5>
                                <small class="text-muted">Login or Register</small>
                            </div>
                        </a>
                    </div>

                    <!-- Teacher -->
                    <div class="col-md-3">
                        <a href="{{ route('login.teacher') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-lg rounded-4 text-center p-4 hover-lift h-100">
                                <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
                                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                                </div>
                                <h5 class="fw-bold">Teacher</h5>
                                <small class="text-muted">Login to Dashboard</small>
                            </div>
                        </a>
                    </div>

                    <!-- Staff -->
                    <div class="col-md-3">
                        <a href="{{ route('login.staff') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-lg rounded-4 text-center p-4 hover-lift h-100">
                                <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:80px;height:80px;">
                                    <i class="fas fa-user-tie fa-2x"></i>
                                </div>
                                <h5 class="fw-bold">Staff</h5>
                                <small class="text-muted">Manager • Accountant • Librarian</small>
                            </div>
                        </a>
                    </div>
                </div>
        </div>
    </div>
@endsection
