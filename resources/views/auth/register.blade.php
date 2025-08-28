@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; );">
    <div class="p-5 shadow-lg rounded-4" style="max-width: 420px; width: 100%; background-color: #fff0f5;">
        
        <h2 class="text-center fw-bold mb-1" style="color: #f78ca2;">✨ Daftar Akun Baru</h2>
        <p class="text-center text-muted mb-4" style="font-size: 0.9rem;">Gabung dan jadi bagian dari kami 🍓</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label text-muted">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="form-control rounded-pill px-3 py-2 @error('name') is-invalid @enderror"
                    style="background-color: #ffeef2; border: 1px solid #fbc4cc;" />
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-muted">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control rounded-pill px-3 py-2 @error('email') is-invalid @enderror"
                    style="background-color: #ffeef2; border: 1px solid #fbc4cc;" />
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-muted">Kata Sandi</label>
                <input type="password" name="password"
                    class="form-control rounded-pill px-3 py-2 @error('password') is-invalid @enderror"
                    style="background-color: #ffeef2; border: 1px solid #fbc4cc;" />
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label text-muted">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation"
                    class="form-control rounded-pill px-3 py-2"
                    style="background-color: #ffeef2; border: 1px solid #fbc4cc;" />
            </div>

            <button type="submit"
                class="btn w-100 rounded-pill py-2"
                style="background: linear-gradient(to right, #f78ca2, #fcd5ce); color: white; font-weight: 600;">
                 Daftar Sekarang
            </button>

            <p class="text-center mt-4 text-muted" style="font-size: 0.85rem;">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-decoration-none"
                    style="color: #f78ca2; font-weight: 500;">
                    Login yuk 🍩
                </a>
            </p>
        </form>
    </div>
</div>
@endsection
