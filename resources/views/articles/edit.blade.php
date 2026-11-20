@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="auth-wrap">
    <section class="card auth-card">
        <span class="eyebrow">Form Artikel</span>
        <h1 style="margin:.5rem 0 .35rem;font-size:1.9rem;letter-spacing:-.03em">Edit Artikel / Berita</h1>
        <p class="muted" style="margin:0">Perbarui data berita. Kosongkan URL gambar untuk memakai placeholder.</p>

        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Judul Artikel</label>
            <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" required placeholder="Masukkan judul berita">

            <label for="image">URL Gambar (opsional)</label>
            <input type="url" id="image" name="image" value="{{ old('image', $article->image) }}" placeholder="https://example.com/gambar.jpg">

            <label>Pratinjau gambar saat ini</label>
            <img src="{{ $article->image_url }}" alt="Gambar artikel" style="width:100%;max-height:240px;object-fit:cover;border-radius:.85rem;border:1px solid var(--line)">

            <label for="body">Isi Berita</label>
            <textarea id="body" name="body" required>{{ old('body', $article->body) }}</textarea>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Artikel</button>
                <a href="{{ route('articles.index') }}" class="btn btn-ghost">Batal</a>
            </div>
        </form>
    </section>
</div>
@endsection
