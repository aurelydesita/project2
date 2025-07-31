@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fw-bold" style="font-family: 'Pacifico', cursive; color: #ff6f61; font-size: 2.5rem;">
        🍽️ Pilihan Makanan yang Bikin Nagih 😋
    </h1>

    <div class="row">
        @forelse($contents as $content)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow rounded-4" style="background-color: #fffaf0;">
                @if($content->image)
                <img src="{{ asset('storage/' . $content->image) }}" class="card-img-top rounded-top-4" alt="Gambar makanan" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title fw-bold text-brown" style="font-family: 'Poppins', sans-serif;">🍱 {{ $content->title }}</h5>
                    <p class="card-text text-muted" style="font-size: 0.9rem;">
                        {{ Str::limit($content->body, 100) }}
                    </p>
                    <span class="badge bg-pink rounded-pill px-3 py-2" style="background-color: #ffb6b9; color: #6a1b1a;">
                        {{ $content->category->name }}
                    </span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center mt-5">
            <img src="https://cdn-icons-png.flaticon.com/512/706/706164.png" alt="Empty Food" width="100">
            <p class="mt-3 text-muted fs-5">Belum ada makanan yang tersedia. Yuk tambahkan menu favoritmu! 🍛</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
