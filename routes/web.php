<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;

Route::get('/', [ContentController::class, 'landing'])->name('landing');

// Resource Category tetap pakai auth di route
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

// Resource Content sekarang rely, sudah pakai middleware di controller, jadi tidak perlu di route
Route::resource('contents', ContentController::class);

Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');
});
// admin dashboard
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return view('dashboard.admin');
})->name('admin.dashboard');

// user dashboard
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', function () {
    return view('dashboard.user');
})->name('user.dashboard');

Route::get('/contents/{id}', [ContentController::class, 'show'])->name('contents.show');

// Admin lihat riwayat
Route::get('/admin/riwayat', [ContentController::class, 'riwayat'])->name('admin.riwayat');

