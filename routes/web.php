<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeminjamanAdminController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Middleware\RoleMiddleware;





//Route Form Data Buku
Route::get('/book', [BookController::class, 'index']);
Route::post('/book', [BookController::class, 'store']);

Route::get('/bootstrap', function () {
    return view('bootstrap');
});

//Login
Route::get('/login', [PagesController::class, 'loginPage'])->name('login');
Route::post('/login', [UsersController::class, 'login'])->name('user.login');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

//Register
Route::get('/register', [PagesController::class, 'registerPage'])->name('register');
Route::post('/register', [UsersController::class, 'register'])->name('user.register');








//modul 6


Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {

    Route::get('/dashboard', [PagesController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    Route::get('/setting/admin', [PagesController::class, 'pengaturanadmin'])->name('pengaturanadmin');
    Route::patch('user/{id}/update_profile_admin', [UsersController::class, 'upload_profile_admin'])->name('action.upload_profile_admin');

//Penerbit Route
Route::prefix('penerbit')->group(function () {
    Route::get('/', [PagesController::class, 'Penerbit'])->name('penerbit');
    Route::get('/create', [PagesController::class, 'createPenerbit'])->name('create_penerbit');
    Route::post('/create', [PenerbitController::class, 'create'])->name('action.createpenerbit');
    Route::get('/{penerbit_id}/update', [PagesController::class, 'update_penerbit'])->name('update_penerbit');
    Route::patch('/{penerbit_id}', [PenerbitController::class, 'update'])->name('penerbit.update');
    Route::delete('/{penerbit_id}', [PenerbitController::class, 'delete'])->name('penerbit.delete');
});

// Buku routes
Route::prefix('buku')->group(function () {
    Route::get('/', [PagesController::class, 'Buku'])->name('buku');
    Route::get('/create', [BukuController::class, 'createBuku'])->name('create_buku');
    Route::post('/create', [BukuController::class, 'create'])->name('action.createbuku');
    Route::get('/{buku_id}/update', [BukuController::class, 'update_buku'])->name('update_buku');
    Route::patch('/{buku_id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/{buku_id}', [BukuController::class, 'delete'])->name('buku.delete');
});

// Kategori Buku routes
Route::prefix('kategori_buku')->group(function () {
    Route::get('/', [PagesController::class, 'Kategori'])->name('kategori_buku');
    Route::get('/create', [PagesController::class, 'createKategoriBuku'])->name('create_kategori_buku');
    Route::post('/create', [KategoriBukuController::class, 'create'])->name('action.createkategoribuku');
    Route::get('/{id}/edit', [PagesController::class, 'update_kategori_buku'])->name('update_kategori_buku');
    Route::patch('/{id}', [KategoriBukuController::class, 'update'])->name('kategori_buku.update');
    Route::delete('/{id}', [KategoriBukuController::class, 'delete'])->name('kategori_buku.delete');
});

// Penulis routes
Route::prefix('penulis')->group(function () {
    Route::get('/', [PagesController::class, 'Penulis'])->name('penulis');
    Route::get('/create', [PagesController::class, 'createPenulis'])->name('create_penulis');
    Route::post('/create', [PenulisController::class, 'create'])->name('action.createpenulis');
    Route::get('/{penulis_id}/update', [PagesController::class, 'update_penulis'])->name('update_penulis');
    Route::patch('/{penulis_id}', [PenulisController::class, 'update'])->name('penulis.update');
    Route::delete('/{penulis_id}', [PenulisController::class, 'delete'])->name('penulis.delete');
});

// Rak routes
Route::prefix('rak')->group(function () {
    Route::get('/', [PagesController::class, 'Rak'])->name('rak');
    Route::get('/create', [PagesController::class, 'createRak'])->name('create_rak');
    Route::post('/create', [RakController::class, 'create'])->name('action.createrak');
    Route::get('/{rak_id}/update', [PagesController::class, 'update_rak'])->name('update_rak');
    Route::patch('/{rak_id}', [RakController::class, 'update'])->name('rak.update');
    Route::delete('/{rak_id}', [RakController::class, 'delete'])->name('rak.delete');
});

// Peminjaman routes
Route::prefix('peminjaman')->group(function () {
    Route::get('/', [PeminjamanController::class, 'admin'])->name('admin.peminjaman');
    Route::post('/admin/{id}/update-status', [PeminjamanController::class, 'updateStatus'])->name('admin.peminjaman.update-status');
    Route::get('/admin/{id}/create', [PeminjamanController::class, 'create'])->name('admin.peminjaman.create');
});

});

Route::middleware(['auth', RoleMiddleware::class.':anggota'])->group(function () {

    Route::get('/dashboardsiswa', [PagesController::class, 'dashboardSiswa'])->name('dashboardSiswa');
    Route::get('/bukusiswa', [BukuController::class, 'siswa'])->name('bukuSiswa');
    Route::get('/setting', [PagesController::class, 'pengaturan'])->name('pengaturan');
    Route::patch('user/{id}/update_profile', [UsersController::class, 'upload_profile'])->name('action.upload_profile');

    Route::prefix('peminjamansiswa')->group(function () {
        Route::get('/', [PeminjamanController::class, 'show'])->name('peminjaman_siswa');
        Route::get('/siswa/create', [PeminjamanController::class, 'createSiswa'])->name('peminjaman.createSiswa');
        Route::post('/siswa/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    });
});

// Route::get('/', [RoutesController::class, 'Dashboard']);

// Route::get('/login', [LoginController::class, 'login']);


// Route::get('/perpustakaan/{buku}', [RoutesController::class, 'perpustakaan']);

// Route::get('/', function () {
    //     return view('welcome');
// });


// Route::match(['get', 'post'], '/anggota', function () {
// 	return 'Hallo, aku membuat route anggota dengan beberapa method';
// });

// Route::redirect('/', '/dashboard');

// Route::get('/', [RequestController::class, 'store']);

// Route::get('/nama', function() {
//     $nama = session('nama');
//     return 'Halaman nama dengan nama ' . $nama;
// });

// Route::get('/array', function () {
//     return [1, 'Perpustakaan', true];
// });

// Route::get('/hello', function () {
//     return response($content = 'Hallo Laravel')
//         ->withHeaders([
//             'Content-Type' => 'text/html',
//             'X-Header-One' => 'Header Value 1',
//             'X-Header-Two' => 'Header Value 2',
//         ]);
// });
























