@extends('layouts.app')

@section('content')
<h2>{{ Auth::user()->name  }}'s Profile Page</h2>
Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas in rem voluptates repellat esse excepturi accusamus neque minus temporibus autem est velit numquam, non aut corrupti, iusto tempore quibusdam error.

@if (session('status') == 'two-factor-authentication-enabled')
    <div class="mb-4 font-medium text-sm text-green-600">
        <h6>Two factor authentication has been enabled.</h6>
        <p>You have naow enabled two factor authentication, please scan the
        following QR code into your phones authenticator application.</p>
        <br>
        {!! auth()->user()->twoFactorQrCodeSvg() !!}
        <br>

        <p>In case you lose, here are your recovery codes</p>
        <ul class="list-group">
            @foreach (auth()->user()->codes() as $code)
                <li>{{ trim($code) }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- 
pg.softcode@gmail.com
password    
IGuVB3Fxbc-H6cDqjffic - used
7EXgxDehGV-yHjHmOD5fV
oz5UCsZxUr-yGzllsEN8q
qCFZinCgR0-88aLDtAwpP
9xweQpK0Qz-jnRFx3AeQv
ThqEzZP8vy-Dan4bHjAGT
w5Cqt9f3Ye-3fF9tKa6Uh
Wh8zpXyuiY-q9APEp4BBr 
--}}

@if (! auth()->user()->two_factor_secret )
    <form action="{{ url('/user/two-factor-authentication') }}" method="post">
        @csrf
        <input type="submit" value="Enable 2FA">
    </form>
@else
    <form action="{{ url('/user/two-factor-authentication') }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Disable 2FA">
    </form>
@endif

{{-- <h6>2FA Codes</h6>
{{ Auth::user()->codes() }}

<h6>Recovery Codes</h6> --}}
{{-- {{ Auth::user()->recoveryCodes() }} --}}




@endsection
