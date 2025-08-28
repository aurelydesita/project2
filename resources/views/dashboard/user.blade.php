@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- Greeting -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="font-family: , cursive; color: #ff6f61;">
            Selamat datang, {{ auth()->user()->name }}! ✨ 
        </h1>
        <p class="text-muted">
             Semoga harimu menyenangkan dengan makanan favoritmu 🍰✨
        </p>
    </div>

    <!-- Quick Access Cards -->
    <div class="row justify-content-center g-4">
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 text-center" style="background-color:#ffe6eb;">
                <div class="card-body py-4">
                    <h5 class="fw-bold" style="color:#d81b60;">📂 Kategori</h5>
                    <a href="{{ route('categories.index') }}" 
                       class="btn btn-sm mt-2 rounded-pill"
                       style="background-color:#d81b60; color:white;">
                        Kelola Kategori
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 text-center" style="background-color:#e1f5fe;">
                <div class="card-body py-4">
                    <h5 class="fw-bold" style="color:#0277bd;">🍴 Menu</h5>
                    <a href="{{ route('contents.index') }}" 
                       class="btn btn-sm mt-2 rounded-pill"
                       style="background-color:#0277bd; color:white;">
                        Kelola Menu
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout -->
    <div class="text-center mt-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="btn px-4 py-2 rounded-pill shadow-sm" 
                    style="background-color: #ff6f61; color: white;">
                🚪 Logout
            </button>
        </form>
              <!-- Tombol Kembali ke Landing -->
        <a href="{{ route('landing') }}" 
        class="btn px-4 py-2 rounded-pill shadow-sm mt-3" 
        style="background-color: #bc8ed8ff; color: white; display:inline-block;">
            🏠 Kembali ke Landing
        </a>
    </div>
</div>
@endsection
