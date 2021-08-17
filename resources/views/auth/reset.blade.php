@extends('layouts.auth')

@section('title')
Create Password
@endsection

@section('description')
Password must be atleast 8 characters long and must contains letters and numbers.
@endsection

@section('form')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Input (Hidden) -->
    <div class="form-group">
        <label for="email_input" class="sr-only">Email</label>
        <input type="hidden" name="email" id="email_input" value="{{ $request->email }}">
    </div>

    <!-- New Password Input -->
    <div class="mb-3">
        <label for="password-input" class="sr-only">New Password</label>
        <input
            id="password-input" name="password" type="password"
            class="mb-0 form-control @error('password') is-invalid @enderror"
            required placeholder="New Password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password-confirm-input" class="sr-only">Confirm Password</label>
        <input
            id="password-confirm-input" name="password_confirmation"
            class="mb-0 form-control
            @error('password_confirmation') is-invalid @enderror"
            type="text" required placeholder="Confirm Password">
    </div>

    <!-- Form submit button -->
    <div class="d-grid">
        <input class="btn btn-block btn-primary mb-4" type="submit" value="Update Password">
    </div>

</form>
@endsection

@section('links')
Want to login instead?
<a href="{{ route('login') }}" class="text-link">Login here</a>
<br>
<a href="{{ url()->previous() }}" class="text-link">Return back!</a>
@endsection

