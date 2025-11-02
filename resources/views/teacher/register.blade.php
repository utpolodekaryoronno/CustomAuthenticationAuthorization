@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
    body {
        background-color: #EEF2F7;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4 text-center">Register Teacher</h2>

             <div class="card mb-3">
                <div class="card-body">
                    <form action="{{ route('register.store.teacher') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control pe-5" id="password">
                            <i class="fa fa-eye position-absolute bottom-0 end-0 translate-middle-y me-3 toggle-password"
                                data-target="#password"
                                style="cursor: pointer;"></i>
                        </div>

                        <div class="mb-3 position-relative">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control pe-5" id="confirmpassword">
                            <i class="fa fa-eye position-absolute bottom-0 end-0 translate-middle-y me-3 toggle-password"
                                data-target="#confirmpassword"
                                style="cursor: pointer;"></i>
                        </div>


                        <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>

                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ route('login.teacher') }}">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
