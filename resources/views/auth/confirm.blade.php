@extends('layouts.auth')

@section('title')
Password Confirmation
@endsection

@section('description')
Password needs to be confirmed before proceeding your request.
@endsection

@section('form')
<form method="POST" action="{{ url('user/confirm-password') }}">
    @csrf

    <!-- Password Input -->
    <div class="mb-3">
        <label for="password_input" class="sr-only">Password</label>
        <input type="password" name="password" id="password_input" class="form-control mb-2"
        placeholder="Enter your password">
        @error('password')
        <span class="invalid-feedback is-invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @if($errors->any())
        <div class="form-group">
            @foreach ($errors->all() as $error)
                <small class="text-danger" style="font-weight: 500">
                    {{ $error }}
                </small>
            @endforeach
        </div>
    @endif

    <!-- Form submit button -->
    <div class="d-grid">
        <input class="btn btn-block btn-primary mb-4" type="submit" value="Confirm Password">
    </div>

</form>
@endsection

@section('links')
<a href="{{ route('password.email') }}" class="d-block">Forgot password?</a>
<a href="{{ url()->previous() }}" class="text-link">Return back!</a>
@endsection
