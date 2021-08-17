@extends('layouts.auth')

@section('title')
Hello
@endsection

@section('description')
Create your new account
@endsection

@section('form')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name Input -->
    <div class="mb-3">
        <label for="name_input" class="sr-only">Name</label>
        <input
            id="name_input" name="name" type="text"
            class="mb-0 form-control @error('name') is-invalid @enderror"
            required autofocus value="{{ old('name') }}"
            autocomplete="name" placeholder="Name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Email Input -->
    <div class="mb-3">
        <label for="email_input" class="sr-only">Email</label>
        <input
            id="email_input" name="email" type="email"
            class="mb-0 form-control @error('email') is-invalid @enderror"
            required value="{{ old('email') }}"
            autocomplete="email" placeholder="Email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Password Input -->
    <div class="mb-3">
        <label for="password-input" class="sr-only">Password</label>
        <input
            id="password-input" name="password" type="password"
            class="mb-0 form-control @error('password') is-invalid @enderror"
            required placeholder="Password">
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
        <input name="register"
        class="btn btn-block mb-4 btn-primary"
        type="submit" value="Register">
    </div>

</form>
@endsection

@section('links')
Already have an account?
<a href="{{ route('login') }}" class="text-link">Login here</a>
@endsection
