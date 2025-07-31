@extends('layouts.app')

@section('content')
<div style="background-color: #fffaf0; min-height: 100vh; padding-top: 60px;">

    <!-- Card Ucapan Selamat -->
    <div class="d-flex justify-content-center">
        <div class="text-center px-4 py-4"
             style="background-color: #ffe6f0;
                    border: 2px dashed #f8a5c2;
                    border-radius: 25px;
                    box-shadow: 0 8px 20px rgba(248, 165, 194, 0.2);
                    max-width: 500px;
                    width: 100%;">
            <h2 class="fw-bold mb-2" style="color: #ff5e88; font-family: 'Comic Sans MS', cursive;">
                Hi, {{ Auth::user()->name }}!
            </h2>
            <p style="font-size: 1rem; color: #7a4e53; font-family: 'Poppins', sans-serif;">
                Kamu berhasil login! 🌸<br>
                Semangat menjalani harimu dengan senyum manis ✨
            </p>
            <div style="font-size: 1.4rem;">🍰</div>
        </div>
    </div>

    <!-- Konten tambahan -->
    <div class="container mt-5 text-center">
        <h4 class="fw-semibold" style="color: #f78ca2;">Selamat datang di Makanan Lezat!</h4>
        <p style="color: #a86875;">Ayo jelajahi menu lezat yang siap menggoyang lidahmu~ 🍜</p>

        <a href="{{ route('landing') }}"
           class="btn mt-3 px-4 py-2"
           style="background-color: #ffb6b9;
                  color: white;
                  font-weight: 600;
                  border-radius: 9999px;
                  box-shadow: 0 4px 12px rgba(255, 182, 185, 0.4);
                  transition: background-color 0.3s ease;">
            ⬅️ Kembali ke Beranda
        </a>
    </div>

</div>
@endsection
