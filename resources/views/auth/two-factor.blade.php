@extends('layouts.auth')

@section('title')
Two Factor Authentication
@endsection

@section('description')
Authentication code is required to enter.
<br>

@endsection

@section('form')

<div class="accordion mb-4" id="tfaAuthentication">

    <div class="accordion-item border-0">

        <h2 class="accordion-header" id="codeInput">
            <button
                type="button" 
                class="accordion-button shadow-none text-dark" 
                data-bs-toggle="collapse" 
                data-bs-target="#codeInputCollapse"
                aria-expanded="true" 
                aria-controls="codeInputCollapse">
                Authentication code
            </button>
        </h2>

        <div 
            id="codeInputCollapse" 
            class="accordion-collapse collapse show" 
            data-bs-parent="#tfaAuthentication"
            aria-labelledby="codeInput">

        <div class="accordion-body bg-white border-0">

                <p>Check Google Authenticator App or any other 2fa app</p>
                <form method="POST" action="{{ url('/two-factor-challenge') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="code_input" class="sr-only">2FA Code</label>
                        <input 
                            id="code_input" 
                            type="number" 
                            name="code" autofocus
                            class="form-control"
                            placeholder="Enter TOTP Code">
                    </div>

                    <button class="btn btn-primary text-white w-100" type="submit">Verify Code</button>
                </form>

            </div>
        </div>
    </div>

    <div class="accordion-item border-0">

        <h2 class="accordion-header" id="recoveryCodeInput">
            <button
                type="button" 
                class="accordion-button collapsed shadow-none text-dark" 
                data-bs-toggle="collapse" 
                data-bs-target="#recoveryCodeInputCollapse"
                aria-expanded="true" 
                aria-controls="recoveryCodeInputCollapse">
                Recovery code
            </button>
        </h2>

        <div 
            id="recoveryCodeInputCollapse" 
            class="accordion-collapse collapse" 
            data-bs-parent="#tfaAuthentication"
            aria-labelledby="recoveryCodeInput">

        <div class="accordion-body bg-white border-0">

                <p>You must have kept them at secured place writen down</p>
                <form method="POST" action="{{ url('/two-factor-challenge') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="recovery_code_input" class="sr-only">2FA Code</label>
                        <input 
                            id="recovery_code_input" 
                            type="text" 
                            name="recovery_code" 
                            class="form-control"
                            placeholder="Enter unused recovery Code">
                    </div>

                    <button class="btn btn-primary text-white w-100" type="submit">Verify Code</button>
                </form>

            </div>
        </div>
    </div>

</div>

@endsection

@section('links')
<a href="{{ url()->previous() }}" class="text-link">Return back!</a>
@endsection
