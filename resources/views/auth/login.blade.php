@extends('layouts.auth')

@section('title')
Welcome User
@endsection

@section('description')
Sign into your account
@endsection

@section('form')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Id Input -->
    <div class="mb-3">
        <label for="email_input" class="sr-only">Email address</label>
        <input type="email" name="email" id="email_input" class="form-control" placeholder="Email Id">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <!-- Password Input -->
    <div class="mb-3">
        <label for="password_input" class="sr-only">Password</label>
        <input type="password" name="password" id="password_input" class="form-control" placeholder="Password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if($errors->any())
            @foreach($errors->all() as $error)
                <small class="text-danger" style="font-weight: 500">
                    * {{ $error }}
                </small>
            @endforeach
        @endif
    </div>

    <!-- Form submit button -->
    <div class="d-grid">
        <input name="login" class="btn btn-block btn-primary mb-4" type="submit" value="Login">
    </div>

</form>
@endsection

@section('links')
<a href="{{ route('password.email') }}" class="">Forgot password?</a>
<p>
    Don't have an account?
    <a href="{{ route('register') }}" class="text-link">Register here</a>
</p>
@endsection
