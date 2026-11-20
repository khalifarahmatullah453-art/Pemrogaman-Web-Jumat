@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<div class="auth-wrap">
    <section class="card auth-card">
        <span class="eyebrow">Form Artikel</span>
        <h1 style="margin:.5rem 0 .35rem;font-size:1.9rem;letter-spacing:-.03em">Tambah Artikel / Berita</h1>
        <p class="muted" style="margin:0">Isi formulir untuk menambahkan berita baru. URL gambar opsional.</p>

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

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <label for="title">Judul Artikel</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul berita">

            <label for="image">URL Gambar (opsional)</label>
            <input type="url" id="image" name="image" value="{{ old('image') }}" placeholder="https://example.com/gambar.jpg">
            <p class="muted" style="margin:.35rem 0 0;font-size:.82rem">Jika kosong, sistem memakai placeholder <code>picsum.photos</code>.</p>

            <label for="body">Isi Berita</label>
            <textarea id="body" name="body" required placeholder="Tulis isi berita di sini...">{{ old('body') }}</textarea>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                <a href="{{ route('articles.index') }}" class="btn btn-ghost">Batal</a>
            </div>
        </form>
    </section>
</div>
@endsection
