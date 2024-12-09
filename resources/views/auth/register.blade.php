@extends('layouts.auth')
@section('title', 'Register')

@include('auth.js.register')
@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg border-0" style="max-width: 400px; width: 100%;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Register Here</h3>
                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        <span class="text-danger">{{ session('error') }} ss</span>
                    </div>
                @endif
                <form action="{{ route('auth.register') }}" method="POST" id="registerForm">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="fullname" name="name"
                            placeholder="Your Full Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation"
                            placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
                    <div class="text-center">
                        <small>
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none">Log in here</a>
                        </small>
                    </div>
                    <div class="text-center mt-3">Or</div>
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-2 mt-3">
                        <button type="button" class="btn btn-outline-danger w-100 w-md-auto" style="min-width: 120px;"
                            id="btn-google" onclick="window.location.href='{{ route('auth.google') }}'">
                            <i class="fab fa-google me-2"></i>Google
                        </button>
                        {{-- <button type="button" class="btn btn-outline-primary w-100 w-md-auto" style="min-width: 120px;">
                            <i class="fab fa-facebook me-2"></i>Facebook
                        </button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
