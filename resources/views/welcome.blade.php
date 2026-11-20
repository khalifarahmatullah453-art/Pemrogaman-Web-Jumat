@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <section class="card">
        <h2>Welcome</h2>
        <p>Selamat datang di PratikDay.</p>

        @guest
            <p>
                Silakan <a href="{{ route('login') }}">Login</a> atau
                <a href="{{ route('register') }}">Register</a>.
            </p>
        @else
            <p>
                Lanjut ke <a href="{{ route('dashboard') }}">Dashboard</a>.
            </p>
        @endguest
    </section>
@endsection
