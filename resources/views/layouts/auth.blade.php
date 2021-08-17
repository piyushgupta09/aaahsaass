@extends('layouts.master')

@section('head')

    <!-- Styles -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

@endsection

@section('body')
    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0"
            style="background-color: rgba(255, 17, 0, 0.103)">
            <div class="container">
                <div class="d-flex justify-content-end rounded"
                    style="background-image: url('storage/images/Flat-Mountains.svg'); min-height: 60vh">
                    <div class="card p-2" style="width: 30rem">
                        <div class="card-body">

                            <!-- Form title -->
                            <div class="row mb-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>@yield('title')</h4>
                                        <p class="mb-0">@yield('description')</h5>
                                    </div>
                                    <a href="/">
                                        <img src="{{ asset('storage/images/logo.png') }}" alt="logo" width="60" height="60" class="img-responsive" />
                                    </a>
                                </div>
                            </div>

                            <!-- Form -->
                            @yield('form')

                            <div style="padding-bottom: 30px">
                                @yield('links')
                            </div>

                            <!-- Auth footer link -->
                            <div class="px-4 pb-4 position-absolute bottom-0 start-0 end-0">
                                <a class="card-link text-muted" href="#">Help</a>
                                <a class="card-link text-muted" href="#">Terms</a>
                                <a class="card-link text-muted" href="#">Privacy</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Scripts -->
        <script src="{{ asset('js/auth.js') }}" defer></script>

    </body>
    
@endsection
