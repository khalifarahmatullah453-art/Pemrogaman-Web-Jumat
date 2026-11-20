@extends('layouts.app')

@section('title', $article->title)

@section('content')
<article class="card detail-wrap detail-hero page-section">
    <img src="{{ $article->image_url }}" alt="Gambar untuk {{ $article->title }}">
    <div class="detail-body">
        <span class="eyebrow">Artikel</span>
        <h1 class="detail-title">{{ $article->title }}</h1>
        <p class="detail-meta">Dipublikasikan pada {{ $article->created_at->format('d M Y') }} oleh {{ $article->user->name }}</p>

        <div class="detail-content">
            {!! nl2br(e($article->body)) !!}
        </div>

        <div class="detail-actions">
            <a href="{{ route('home') }}" class="btn btn-ghost">&larr; Kembali ke Home</a>
            <a href="{{ route('articles.index') }}" class="btn btn-ghost">Lihat semua artikel</a>
            @auth
                @if ($article->user_id === auth()->id())
                    <span class="sep">|</span>
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Edit</a>
                @endif
            @endauth
        </div>
    </div>
</article>
@endsection
