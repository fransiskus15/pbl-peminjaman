<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Admin\GoodsController;
use App\Http\Controllers\RoomBookingController;


Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/loan/create', [LoanController::class, 'create'])->name('loan.create');
Route::post('/loan', [LoanController::class, 'store'])->name('loan.store');
Route::get('/loan/return', [LoanController::class, 'returnForm'])->name('loan.return');
Route::post('/loan/return', [LoanController::class, 'return'])->name('loan.processReturn');

Route::patch('/loan/{id}/approve', [LoanController::class, 'approve'])->name('loan.approve');
Route::patch('/loan/{id}/reject', [LoanController::class, 'reject'])->name('loan.reject');

Route::get('/admin/loans', [LoanController::class, 'adminIndex'])->name('admin.loans.index');
Route::put('/admin/loans/{id}', [LoanController::class, 'update'])->name('admin.loans.update');

Route::get('/tool', function () {
    return view('tool',[
    ]);
});

Route::post('/tool', [PeminjamanController::class, 'store'])->name('tool');


Route::get('/class', function () {
    return view('class',[
    ]);
});

Route::post('/form-peminjaman-ruangan', 'PeminjamanRuanganController@store');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard_admin', [AuthController::class, 'adminDashboard'])->name('dashboard.admin');
});

Route::middleware(['auth.mahasiswa'])->group(function () {
    Route::get('/dashboard_mahasiswa', [AuthController::class, 'mahasiswaDashboard'])->name('dashboard.mahasiswa');
});

Route::get('/status', [LoanController::class, 'status'])->name('loan.status');

// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//     // Rute untuk menampilkan daftar barang
//     Route::get('goods', [GoodsController::class, 'index'])->name('goods.index');

//     // Rute untuk menampilkan formulir tambah barang
//     Route::get('goods/create', [GoodsController::class, 'create'])->name('goods.create');

//     // Rute untuk menyimpan data barang yang baru ditambahkan
//     Route::post('goods', [GoodsController::class, 'store'])->name('goods.store');

//     // Rute untuk menampilkan formulir edit barang
//     Route::get('goods/{good}/edit', [GoodsController::class, 'edit'])->name('goods.edit');

//     // Rute untuk memperbarui data barang yang diedit
//     Route::put('goods/{good}', [GoodsController::class, 'update'])->name('goods.update');

//     // Rute untuk menghapus barang
//     Route::delete('goods/{good}', [GoodsController::class, 'destroy'])->name('goods.destroy');
// });

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard_admin', [AuthController::class, 'adminDashboard'])->name('dashboard.admin');
    
    // Rute untuk mengakses halaman daftar barang
    Route::get('/admin/goods', [GoodsController::class, 'index'])->name('admin.goods.index');
    
    // Rute untuk menampilkan formulir tambah barang
    Route::get('/admin/goods/create', [GoodsController::class, 'create'])->name('admin.goods.create');
    
    // Rute untuk menyimpan data barang yang baru ditambahkan
    Route::post('/admin/goods', [GoodsController::class, 'store'])->name('admin.goods.store');
    
    // Rute untuk menampilkan formulir edit barang
    Route::get('/admin/goods/{goods}/edit', [GoodsController::class, 'edit'])->name('admin.goods.edit');
    
    // Rute untuk memperbarui data barang yang diedit
    // Route::put('/admin/goods/{good}', [GoodsController::class, 'update'])->name('admin.goods.update');
    Route::put('/admin/goods/{goods}', [GoodsController::class, 'update'])->name('admin.goods.update');

    
    // Rute untuk menghapus barang
    // Route::delete('/admin/goods/{goods}', [GoodsController::class, 'destroy'])->name('admin.goods.destroy');
    Route::delete('/admin/goods/{goods}', [GoodsController::class, 'destroy'])->name('admin.goods.destroy');
});

// Route::get('/admin/goods/index', [GoodsController::class, 'index'])
//     ->name('admin.goods.index');

Route::get('/riwayat-peminjaman', [LoanController::class, 'riwayatPeminjaman'])->name('riwayat.peminjaman');
Route::get('/admin/riwayat-peminjaman', [LoanController::class, 'adminRiwayatPeminjaman'])->name('admin.riwayat.peminjaman');

Route::get('/room_bookings/create', [RoomBookingController::class, 'create'])->name('room_bookings.create');
Route::post('/room_bookings', [RoomBookingController::class, 'store'])->name('room_bookings.store');
// Route::get('/room_bookings/create', [RoomBookingController::class, 'create'])
//     ->name('room_bookings.create');
// Route::POST('/room_bookings/create', [RoomBookingController::class, 'store'])
//     ->name('room_bookings.store');

// Tambahkan route untuk halaman status pengembalian oleh admin
Route::get('/admin/returns', [LoanController::class, 'adminCheckedIndex'])->name('admin.loans.return');
// Tambahkan route untuk update status pengembalian oleh admin
Route::put('/admin/returns/{id}', [LoanController::class, 'returnUpdate'])->name('admin.loans.returns.update');
