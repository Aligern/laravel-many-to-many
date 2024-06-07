@extends('layouts.app')
@section('content')
    <section class="container">
        @guest
        <h1>Benvenuto.</h1>
        <div class="container text-white">
            <p>Effettua il Login o Registrati per continuare.</p>
        </div>
        <div>
            <a href="{{ route('login') }}" class="btn text-white ls-glass-badge mb-3">Login</a>
        </div>
        <div>
            <a href="{{ route('register') }}" class="btn text-white ls-glass-badge mb-3">Registrati</a>
        </div>
        @endguest
        @if (Auth::check())
        <div class="container text-white">
            <h1>Benvenuto {{ Auth::user()->name }}.</h1>
            <a href="{{ url('admin') }}" class="btn text-white ls-glass-badge mb-3">Dashboard</a>
            <a href="{{ route('admin.projects.index') }}" class="btn text-white ls-glass-badge mb-3">Projects</a>
            <a href="{{ route('admin.technologies.index') }}" class="btn text-white ls-glass-badge mb-3">Technologies</a>
            <a href="{{ route('admin.types.index') }}" class="btn text-white ls-glass-badge mb-3">Types</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn text-white ls-glass-badge mb-3">Logout</button>
            </form>
        </div>
        @endif

    </section>
@endsection
