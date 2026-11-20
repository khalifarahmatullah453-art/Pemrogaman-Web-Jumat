@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div class="section-head">
    <div>
        <span class="eyebrow">Manajemen</span>
        <h1 class="section-title" style="font-size:1.8rem">Daftar Artikel</h1>
        <p class="section-sub">Kelola seluruh berita di portal.</p>
    </div>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Artikel Baru</a>
</div>

@if (session('success'))
    <div class="flash">{{ session('success') }}</div>
@endif

@if ($articles->isNotEmpty())
    <div class="article-list">
        @foreach ($articles as $article)
            <article class="article-row">
                <img src="{{ $article->image_url }}" alt="Gambar {{ $article->title }}">
                <div>
                    <h3><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h3>
                    <p class="meta">oleh {{ $article->user->name }} • {{ $article->created_at->format('d M Y') }}</p>
                    <p class="excerpt">{{ \Illuminate\Support\Str::limit($article->body, 130) }}</p>
                </div>
                <div class="article-actions">
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-ghost btn-sm">Baca</a>
                    @if ($article->user_id === auth()->id())
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-ghost btn-sm">Edit</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                </div>
            </article>
        @endforeach
    </div>

    {{ $articles->links('pagination::default') }}
@else
    <section class="card"><p class="empty" style="margin:0">Belum ada artikel.</p></section>
@endif
@endsection
