@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="card page-section">
    <span class="eyebrow">Dashboard</span>
    <h1 style="margin:.5rem 0 .4rem;font-size:clamp(1.8rem,3vw,2.6rem);letter-spacing:-.035em">Halo, {{ $user->name }}</h1>
    <p class="muted" style="margin:0">Ini adalah ringkasan singkat aktivitas artikel di aplikasi kamu.</p>
    <div class="hero-actions">
        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-sm">+ Tambah Artikel Baru</a>
        <a href="{{ route('articles.index') }}" class="btn btn-ghost btn-sm">Lihat Semua Artikel</a>
        <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">Lihat Halaman Home</a>
    </div>
</section>

<div class="stat-grid">
    <section class="card stat-card">
        <span class="stat-label">Total Artikel</span>
        <span class="stat-value">{{ $totalArticles }}</span>
        <span class="muted">Jumlah seluruh artikel yang ada di sistem.</span>
    </section>

    <section class="card stat-card">
        <span class="stat-label">Artikel Kamu</span>
        <span class="stat-value">{{ $myArticles }}</span>
        <span class="muted">Artikel yang dibuat oleh akun kamu.</span>
    </section>

    <section class="card stat-card">
        <span class="stat-label">Aksi Cepat</span>
        <ul class="quick-list">
            <li><a href="{{ route('articles.create') }}">+ Tambah Artikel Baru <span>→</span></a></li>
            <li><a href="{{ route('articles.index') }}">Lihat Semua Artikel <span>→</span></a></li>
            <li><a href="{{ route('home') }}">Lihat Halaman Home <span>→</span></a></li>
        </ul>
    </section>
</div>

<div class="section-head">
    <div>
        <h2 class="section-title">Artikel Terbaru</h2>
        <p class="section-sub">Lima artikel terakhir di portal.</p>
    </div>
</div>

@if ($latestArticles->isNotEmpty())
    <div class="news-grid">
        @foreach ($latestArticles as $article)
            <article class="article-card">
                <img src="{{ $article->image_url }}" alt="Thumbnail {{ $article->title }}" class="thumb">
                <div class="article-body">
                    <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
                    <p class="meta">{{ $article->user->name }} • {{ $article->created_at->format('d M Y') }}</p>
                    <p class="excerpt">{{ \Illuminate\Support\Str::limit($article->body, 110) }}</p>
                    <div class="article-footer">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-ghost btn-sm">Baca</a>
                        <span class="meta">{{ $article->slug }}</span>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@else
    <section class="card"><p class="empty" style="margin:0">Belum ada artikel yang bisa ditampilkan.</p></section>
@endif

<section class="card" style="margin-top:1.5rem">
    <h2 class="section-title" style="font-size:1.2rem">Info Akun</h2>
    <ul class="account-list">
        <li><strong>Nama:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>
    <p class="muted" style="margin-top:.75rem">Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.</p>
</section>
@endsection
