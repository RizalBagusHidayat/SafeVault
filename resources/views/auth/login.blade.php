@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg border-0" style="max-width: 400px; width: 100%;">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Login Here</h3>
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                <form action="{{ route('auth.login') }}" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="email"
                            placeholder="Email or Phone">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Log In</button>
                    <div class="text-center">
                        <small>
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-decoration-none">Register here</a>
                        </small>
                    </div>
                    <div class="text-center mt-3">Or</div>
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-2 mt-3">
                        <button type="button" class="btn btn-outline-danger w-100 w-md-auto" style="min-width: 120px;"
                            onclick="window.location.href='{{ route('auth.google') }}'">
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
