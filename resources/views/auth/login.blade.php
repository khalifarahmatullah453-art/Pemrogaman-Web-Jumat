@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="auth-wrap">
    <section class="card auth-card">
        <span class="eyebrow">Akun</span>
        <h1 style="margin:.5rem 0 .35rem;font-size:1.9rem;letter-spacing:-.03em">Login</h1>
        <p class="muted" style="margin:0">Gunakan email dan password untuk melanjutkan.</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}" novalidate>
            @csrf

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nama@example.com">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="••••••••">

            <label class="check-row" for="remember">
                <input type="checkbox" id="remember" name="remember">
                <span>Remember me</span>
            </label>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="width:100%">Masuk</button>
            </div>
        </form>

        <p class="auth-links">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </section>
</div>
@endsection
