@extends('layouts.app')

@section('content')
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas in rem voluptates repellat esse excepturi accusamus neque minus temporibus autem est velit numquam, non aut corrupti, iusto tempore quibusdam error.
    <br>
    @guest
        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
    @endguest

    @auth
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Logout">
        </form>
    @endauth

@endsection
