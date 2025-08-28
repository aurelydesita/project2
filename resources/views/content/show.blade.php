@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4" style="background-color: #fffaf0;">
        
        <!-- Gambar -->
    @if($content->image)
    <div class="text-center">
        <img src="{{ asset('storage/' . $content->image) }}" 
            alt="{{ $content->title }}" 
            class="img-fluid rounded-4 shadow-sm"
            style="max-width: 600px; height: auto; object-fit: cover;">
    </div>
    @endif

        <div class="card-body p-4">
            
            <!-- Judul -->
            <h2 class="fw-bold mb-3" 
                style="font-family: , cursive; color: #ff6f61;">
                 {{ $content->title }}
            </h2>

            <!-- Kategori -->
            <span class="badge px-3 py-2 mb-3" 
                  style="background-color: #ffb6b9; color: #6a1b1a; font-size: 0.9rem;">
                {{ $content->category->name }}
            </span>

            <!-- Deskripsi -->
            <p class="text-muted fs-5 mt-3">{{ $content->body }}</p>

            <!-- Detail Tambahan -->
            <p class="text-muted mt-4 mb-1" style="font-size: 0.95rem;">
                👩‍🍳 Dibuat oleh: <strong>{{ $content->user->name ?? 'Anonim' }}</strong>
            </p>
            <p class="text-muted mb-3" style="font-size: 0.9rem;">
                📅 Ditambahkan pada {{ $content->created_at->format('d M Y') }}
            </p>

            <!-- Tombol Kembali -->
            <a href="{{ route('landing') }}" 
               class="btn mt-3" 
               style="background-color:#ff6f61; color:white; border-radius:20px; padding:8px 18px;">
                ⬅️ Kembali ke Daftar
            </a>
        </div>
    </div>
</div>
@endsection
