@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="auth-wrap">
    <section class="card auth-card">
        <span class="eyebrow">Akun</span>
        <h1 style="margin:.5rem 0 .35rem;font-size:1.9rem;letter-spacing:-.03em">Register</h1>
        <p class="muted" style="margin:0">Buat akun untuk menulis dan mengelola artikel.</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ url('/register') }}" novalidate>
            @csrf

            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama lengkap">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="nama@example.com">

            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1rem">
                <div>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">
                </div>
                <div>
                    <label for="password_confirmation">Ulangi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="width:100%">Daftar</button>
            </div>
        </form>

        <p class="auth-links">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </section>
</div>
@endsection
