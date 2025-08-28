@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Judul -->
    <h1 class="text-center mb-5 fw-bold" 
        style="font-family: 'Pacifico', cursive; color: #ff6f61; font-size: 2.5rem;">
        🍽️ Pilihan Makanan yang Bikin Nagih 😋
    </h1>

    <!-- Form Pencarian -->
    <div class="container mb-4">
        <form action="{{ route('landing') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" 
                   placeholder="Cari konten..." value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit">Search</button>
        </form>
    </div>

    <!-- Daftar Konten -->
    <div class="row">
        @forelse($contents as $content)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow rounded-4" style="background-color: #fffaf0;">
                @if($content->image)
                <img src="{{ asset('storage/' . $content->image) }}" 
                     class="card-img-top rounded-top-4" 
                     alt="{{ $content->title }}" 
                     style="height: 200px; object-fit: cover;">
                @endif

                <div class="card-body">
                    <!-- Judul -->
                    <h5 class="card-title fw-bold text-brown" style="font-family: 'Poppins', sans-serif;">
                        🍱 {{ $content->title }}
                    </h5>

                    <!-- Deskripsi singkat -->
                    <p class="card-text text-muted" style="font-size: 0.9rem;">
                        {{ Str::limit($content->body, 100) }}
                    </p>

                    <!-- Kategori -->
                    <span class="badge bg-pink rounded-pill px-3 py-2 mb-2" 
                          style="background-color: #ffb6b9; color: #6a1b1a;">
                        {{ $content->category->name }}
                    </span>

                    <!-- Detail tambahan -->
                    <p class="text-muted mt-2 mb-1" style="font-size: 0.85rem;">
                        👩‍🍳 Dibuat oleh: <strong>{{ $content->user->name ?? 'Anonim' }}</strong>
                    </p>
                    <p class="text-muted mb-2" style="font-size: 0.8rem;">
                        📅 {{ $content->created_at->format('d M Y') }}
                    </p>

                    <!-- Tombol Detail -->
                    <a href="{{ route('contents.show', $content->id) }}" 
                       class="btn btn-sm btn-outline-danger rounded-pill px-3">
                       🍴 Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <!-- Jika data kosong -->
        <div class="col-12 text-center mt-5">
            <img src="https://cdn-icons-png.flaticon.com/512/706/706164.png" 
                 alt="Empty Food" width="100">
            <p class="mt-3 text-muted fs-5">
                Belum ada makanan yang tersedia. Yuk tambahkan menu favoritmu! 🍛
            </p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $contents->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Tombol Kembali ke Dashboard -->
@auth
<div class="text-center mt-5">
    <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('user.dashboard') }}"
       class="btn px-4 py-2 rounded-pill shadow-sm"
       style="background-color:#bc8ed8ff; color:white;">
        🏠 Kembali ke Dashboard
    </a>
</div>
@endauth
@endsection
