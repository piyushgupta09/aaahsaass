@extends('layouts.master')

@section('head')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endsection

@section('body')

    <body>

        {{-- <x-navbar /> --}}

        @yield('header')

        <!-- Content -->
        <div id="app" class="container">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </body>
@endsection
