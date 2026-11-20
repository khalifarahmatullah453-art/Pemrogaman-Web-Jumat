@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero card page-section">
    <div>
        <span class="eyebrow">Portal Berita</span>
        <h1>Portal Berita Sederhana</h1>
        <p>
            Selamat datang di portal berita sederhana berbasis Laravel.
            Berita di bawah ini diambil dari tabel <code>articles</code>.
        </p>

        <div class="hero-actions">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-ghost">Register</a>
            @else
                <a href="{{ route('articles.index') }}" class="btn btn-primary">Kelola Artikel</a>
                <a href="{{ route('articles.create') }}" class="btn btn-ghost">+ Tambah Artikel</a>
            @endguest
        </div>

        @guest
            <p class="muted" style="margin-top:1rem">Kamu belum login. Untuk mengelola berita, silakan Login atau Register.</p>
        @else
            <p class="muted" style="margin-top:1rem">Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>. Kamu dapat menambah berita di menu Artikel.</p>
        @endauth
    </div>
</section>

<div class="section-head">
    <div>
        <h2 class="section-title">Berita Terbaru</h2>
        <p class="section-sub">Enam berita terbaru dari database.</p>
    </div>
    <a href="{{ route('articles.index') }}" class="btn btn-ghost btn-sm">Lihat semua</a>
</div>

@if ($articles->isNotEmpty())
    <div class="news-grid">
        @foreach ($articles as $article)
            <article class="article-card">
                <img src="{{ $article->image_url }}" alt="Gambar {{ $article->title }}" class="thumb">
                <div class="article-body">
                    <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
                    <p class="meta">{{ $article->created_at->format('d M Y') }} • {{ $article->user->name }}</p>
                    <p class="excerpt">{{ \Illuminate\Support\Str::limit($article->body, 140) }}</p>
                    <div class="article-footer">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-ghost btn-sm">Baca selengkapnya &rarr;</a>
                        <span class="meta">{{ $article->slug }}</span>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@else
    <section class="card">
        <p class="empty" style="margin:0">
            Belum ada berita yang tersedia.
            @auth
                Silakan buat berita baru di menu <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
            @endauth
        </p>
    </section>
@endif
@endsection
