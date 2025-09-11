<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;
use App\Exports\KontenExport;
use App\Exports\KategoriExport;
use App\Exports\UserExport;
use App\Exports\MultiSheetExport;
use Maatwebsite\Excel\Facades\Excel;


Route::get('/', [ContentController::class, 'landing'])->name('landing');

//  CATEGORY 
Route::middleware(['auth'])->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])
        ->middleware('permission:kategori_read')->name('categories.index');

    Route::get('categories/create', [CategoryController::class, 'create'])
        ->middleware('permission:kategori_create')->name('categories.create');

    Route::post('categories', [CategoryController::class, 'store'])
        ->middleware('permission:kategori_create')->name('categories.store');

    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])
        ->middleware('permission:kategori_write')->name('categories.edit');

    Route::put('categories/{category}', [CategoryController::class, 'update'])
        ->middleware('permission:kategori_write')->name('categories.update');

    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])
        ->middleware('permission:kategori_delete')->name('categories.destroy');

});

// CONTENT 
Route::middleware(['auth'])->group(function () {
    Route::get('contents', [ContentController::class, 'index'])
        ->middleware('permission:konten_read')->name('contents.index');

    Route::get('contents/create', [ContentController::class, 'create'])
        ->middleware('permission:konten_create')->name('contents.create');

    Route::post('contents', [ContentController::class, 'store'])
        ->middleware('permission:konten_create')->name('contents.store');

    Route::get('contents/{content}/edit', [ContentController::class, 'edit'])
        ->middleware('permission:konten_write')->name('contents.edit');

    Route::put('contents/{content}', [ContentController::class, 'update'])
        ->middleware('permission:konten_write')->name('contents.update');

    Route::delete('contents/{content}', [ContentController::class, 'destroy'])
        ->middleware('permission:konten_delete')->name('contents.destroy');
});

// route show (bisa dibuka semua yg login / public, sesuai kebutuhan)
Route::get('/contents/{id}', [ContentController::class, 'show'])->name('contents.show');

//  AUTH 
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');
});

//  DASHBOARD 
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return view('dashboard.admin');
})->name('admin.dashboard');

Route::middleware(['auth', 'role:user'])->get('/user/dashboard', function () {
    return view('dashboard.user');
})->name('user.dashboard');

//  USER MANAGEMENT 
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class,'index'])->name('users.index');  
    Route::put('/admin/users/{user}/permissions', [UserController::class,'updateRoles'])
        ->name('users.updateRoles'); 
    Route::get('/admin/users/{user}/permissions/edit', [UserController::class,'edit'])
        ->name('users.permissions.edit');
    Route::resource('users', UserController::class);    

Route::middleware(['role:admin'])->group(function () {

    // Export konten
    Route::get('/export/konten', function () {
        return Excel::download(new KontenExport, 'konten.xlsx');
    })->name('export.konten');

    // Export kategori
    Route::get('/export/kategori', function () {
        return Excel::download(new KategoriExport, 'kategori.xlsx');
    })->name('export.kategori');

    // Export user
    Route::get('/export/user', function () {
        return Excel::download(new UserExport, 'user.xlsx');
    })->name('export.user');

    // Export semua (multi sheet)
    Route::get('/export/all', function () {
        return Excel::download(new MultiSheetExport, 'data_semua.xlsx');
    })->name('export.all');

});

});


