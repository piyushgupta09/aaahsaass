@extends('layouts.auth')

@section('title')
Verify Email Address
@endsection

@section('description')
Check your registered email address for
verification link, then click on
'Verify Email Address' button to verify
your account.
@endsection

@section('form')

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            A new email verification link has been emailed to you!
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
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
            <input class="btn btn-block btn-primary mb-4" type="submit" value="Resend Verification Link">
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
