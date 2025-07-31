@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #fff8f0; /* warna pastel yang sama */
    }
</style>

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #fff8f0;">
    <div class="p-4 shadow-lg rounded-4" style="max-width: 400px; width: 100%; background-color: #ffeef2;">
        <h3 class="text-center fw-bold mb-1" style="color: #f78ca2;">
            🍰 Login ke Makanan Lezat
        </h3>
        <p class="text-center text-muted mb-4" style="font-size: 0.9rem;">
            Yuk masuk dan nikmati kelezatannya!
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label text-muted">Email</label>
                <input type="email"
                       class="form-control rounded-pill px-3 py-2 @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email') }}" required autofocus
                       style="background-color: #fff6fa; border: 1px solid #d3bccc;">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label text-muted">Password</label>
                <input type="password"
                       class="form-control rounded-pill px-3 py-2 @error('password') is-invalid @enderror"
                       id="password" name="password" required
                       style="background-color: #fff6fa; border: 1px solid #d3bccc;">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                    class="btn w-100 rounded-pill py-2"
                    style="background: linear-gradient(to right, #f78ca2, #fcd5ce); color: white; font-weight: 600;">
                 Login
            </button>

            <p class="text-center mt-4 text-muted" style="font-size: 0.85rem;">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-decoration-none"
                   style="color: #f78ca2; font-weight: 500;">
                    Daftar di sini 🧁
                </a>
            </p>
        </form>
    </div>
</div>
@endsection
