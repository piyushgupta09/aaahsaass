@extends('layouts.auth')

@section('title')
Two Factor Authentication
@endsection

@section('description')
Authentication code is required to enter.
<br>
<small>Check Google Authenticator App or any other 2fa app</small>
@endsection

@section('form')

<!-- 2FA Codes -->
<div id="collapse2FACode" class="collapse show" aria-labelledby="heading2FACode" data-parent="#accordion">

    <!-- Form title -->
    <p class="mb-2">Enter Authentication Code</p>

    <!-- Form -->
    <form method="POST" action="{{ url('/two-factor-challenge') }}">
        @csrf

        <!-- 2fa Code Input -->
        <div class="mb-3">
            <label for="code_input" class="sr-only">2FA Code</label>
            <input type="number" name="code" id="code_input" class="form-control" placeholder="Enter TOTP Code">
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if($errors->any())
                <div class="form-group">
                    @foreach($errors->all() as $error)
                        <small class="text-danger" style="font-weight: 500">
                            {{ $error }}
                        </small>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Submit form -->
        <input
        class="btn w-100 btn-primary mb-4"
        type="submit"
        value="Verify Code">

    </form>

    <div id="headingRecoveryCode" data-toggle="collapse" data-target="#collapseRecoveryCode" aria-expanded="true"
        aria-controls="collapseRecoveryCode">
        Having trouble?
        <span class="text-primary" style="cursor: pointer;">
            <u>Use Recovery Code</u>
        </span>
    </div>
</div>

<!-- Recovery Codes -->
<div id="collapseRecoveryCode" class="collapse" aria-labelledby="headingRecoveryCode" data-parent="#accordion">

    <!-- Form title -->
    <p class="mb-2">Enter Recovery Code</p>

    <!-- Form -->
    <form method="POST" action="{{ url('/two-factor-challenge') }}">
        @csrf

        <!-- Recovery code Input -->
        <div class="mb-3">
            <label for="recovery_code_input" class="sr-only">Recovery Code</label>
            <input type="number" name="recovery_code" id="recovery_code_input" class="form-control"
                placeholder="Enter unused recovery Code">
            @error('recovery_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if($errors->any())
                <div class="form-group">
                    @foreach($errors->all() as $error)
                        <small class="text-danger" style="font-weight: 500">
                            {{ $error }}
                        </small>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Submit form -->
        <input class="btn w-100 btn-primary mb-4" type="submit" value="Verify Code">
    </form>

    <div id="heading2FACode" data-toggle="collapse" data-target="#collapse2FACode" aria-expanded="true"
        aria-controls="collapse2FACode">
        Having trouble?
        <span class="text-primary"><u>Use Authentication Code</u></span>
    </div>
</div>

@endsection

@section('links')
<a href="{{ url()->previous() }}" class="text-link">Return back!</a>
@endsection
