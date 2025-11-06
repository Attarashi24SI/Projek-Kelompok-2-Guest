<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('pages.home');
});

// home page
Route::get('/home', function () {
    return view('pages.Home');
})->name('pages.home');

// Halaman About
Route::get('/about', function () {
    return view('pages.about');
})->name('pages.about');


Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

// Auth Login Page
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'process'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



// Halaman login
Route::get('/auth', [AuthController::class, 'index'])->name('auth');

// Proses login (POST)
Route::post('/auth/process', [AuthController::class, 'process'])->name('auth.process');

// Logout
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');




// warga
// tampilkan data
Route::get('/warga', [WargaController::class, 'index'])->name('pages.warga.index');

// tampilkan form tambah data
Route::get('/warga/create', [WargaController::class, 'create'])->name('pages.warga.create');

// simpan data baru
Route::post('/warga/store', [WargaController::class, 'store'])->name('pages.warga.store');

// tampilkan form edit
Route::get('/warga/edit/{id}', [WargaController::class, 'edit'])->name('pages.warga.edit');

// update data hasil edit
Route::post('/warga/update/{id}', [WargaController::class, 'update'])->name('pages.warga.update');

// hapus data
Route::get('/warga/delete/{id}', [WargaController::class, 'delete'])->name('pages.warga.delete');

// user
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


// lembaga
// Menampilkan daftar lembaga
Route::get('/pages/perangkat/lembaga', [LembagaController::class, 'index'])
    ->name('pages.perangkat.lembaga.index');

// Menampilkan form tambah lembaga
Route::get('/pages/perangkat/lembaga/create', [LembagaController::class, 'create'])
    ->name('pages.perangkat.lembaga.create');

// Menyimpan data lembaga
Route::post('/pages/perangkat/lembaga/store', [LembagaController::class, 'store'])
    ->name('pages.perangkat.lembaga.store');

// Mengedit lembaga
Route::get('/pages/perangkat/lembaga/{id}/edit', [LembagaController::class, 'edit'])
    ->name('pages.perangkat.lembaga.edit');

// Mengupdate data lembaga
Route::put('/pages/perangkat/lembaga/{id}', [LembagaController::class, 'update'])
    ->name('pages.perangkat.lembaga.update');

// Menghapus lembaga
Route::delete('/pages/perangkat/lembaga/{id}', [LembagaController::class, 'destroy'])
    ->name('pages.perangkat.lembaga.destroy');







