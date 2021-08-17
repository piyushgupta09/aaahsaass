@extends('layouts.auth')

@section('title')
Forgot Password
@endsection

@section('description')
Enter your email address to reset your password.
@endsection

@section('form')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('password.request') }}">
    @csrf

    <!-- Email Input -->
    <div class="mb-3">
        <label for="email_input" class="sr-only">Email address</label>
        <input type="email" name="email" id="email_input" class="form-control mb-2" placeholder="Email Address">
        @error('email')
        <span class="invalid-feedback is-invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <!-- Form submit button -->
    <div class="d-grid">
        <input class="btn btn-block btn-primary mb-4" type="submit" value="Send Reset Link">
    </div>

</form>
@endsection

@section('links')
Back to
<a href="{{ route('login') }}" class="text-link">Account Login</a>
<br>
Don't have an account?
<a href="{{ route('register') }}" class="text-link">Register here</a>
@endsection
