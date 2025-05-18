<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Pattern untuk parameter id harus berupa angka
Route::pattern('id', '[0-9]+');

// Route untuk autentikasi
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister']);

// Grup route yang membutuhkan autentikasi 
Route::middleware(['auth'])->group(function(){
    Route::get('/', [WelcomeController::class,'index']);
    // route Level
    
    // artinya semua route di dalam group ini harus punya role ADM (Administrator)
    Route::middleware(['authorize:ADM'])->group(function(){
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']);          // <enampilkan halaman awal user
            Route::post('/list', [LevelController::class, 'list']);      // Menampilkan data user dalam bentuk json untuk datatables
            Route::get('/create', [LevelController::class, 'create']);   // menampilkan halaman form tambah user
            Route::post('/', [LevelController::class, 'store']);         // menyimpan data user baru
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);     // Menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']);            // Menyimpan data user baru Ajax
            Route::get('/{id}', [LevelController::class, 'show']);       // menampilkan detail user
            Route::get('/{id}/edit', [LevelController::class, 'edit']);  // Menampilkan halaman form edit user
            Route::put('/{id}', [LevelController::class, 'update']);     // menyimpan perubahan data user
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);        // Menampilkan halaman form edit user Ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);   // Menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);  // Untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data user Ajax
            Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data user
        });
    });

    Route::middleware(['authorize:ADM,MNG'])->group(function(){
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']);
            Route::post('/list', [BarangController::class, 'list']);
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // ajax form create
            Route::post('/store_ajax', [BarangController::class, 'store_ajax']); // ajax store
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // ajax form edit
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // ajax update
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // ajax form confirm
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // ajax delete

            // Route untuk Import Excel
            Route::get('/import', [BarangController::class, 'import']); // ajax form upload excel
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
            Route::get('/export_excel', [BarangController::class, 'export_excel']); // ajax import excel
        });
    });
    
    // route Kategori
    
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);          // <enampilkan halaman awal user
        Route::post('/list', [UserController::class, 'list']);      // Menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [UserController::class, 'create']);   // menampilkan halaman form tambah user
        Route::post('/', [UserController::class, 'store']);         // menyimpan data user baru
        Route::get('/create_ajax', [UserController::class, 'create_ajax']);     // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [UserController::class, 'store_ajax']);            // Menyimpan data user baru Ajax
        Route::get('/{id}', [UserController::class, 'show']);       // menampilkan detail user
        Route::get('/{id}/edit', [UserController::class, 'edit']);  // Menampilkan halaman form edit user
        Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);        // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);   // Menyimpan perubahan data user Ajax
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);  // Untuk tampilkan form confirm delete user Ajax
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
        Route::delete('/{id}', [UserController::class, 'destroy']); // menghapus data user
    });
    
    
    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']);        // menampilkan halaman awal user
        Route::post('/list', [KategoriController::class, 'list']);    // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [KategoriController::class, 'create']); // menampilkan halaman form tambah user
        Route::post('/', [KategoriController::class, 'store']);       // menyimpan data user baru
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);     // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);            // Menyimpan data user baru Ajax
        Route::get('/{id}', [KategoriController::class, 'show']);     // menampilkan detail user
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);// menampilkan halaman form edit user
        Route::put('/{id}', [KategoriController::class, 'update']);   // menyimpan perubahan data user
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);        // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);   // Menyimpan perubahan data user Ajax
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);  // Untuk tampilkan form confirm delete user Ajax
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // Untuk hapus data user Ajax
        Route::delete('/{id}', [KategoriController::class, 'destroy']);// menghapus data user
    });
    
    
    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', [SupplierController::class, 'index']);        // menampilkan halaman awal user
        Route::post('/list', [SupplierController::class, 'list']);    // menampilkan data user dalam bentuk json untuk datatables
        Route::get('/create', [SupplierController::class, 'create']); // menampilkan halaman form tambah user
        Route::post('/', [SupplierController::class, 'store']);       // menyimpan data user baru
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);     // Menampilkan halaman form tambah user Ajax
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);            // Menyimpan data user baru Ajax
        Route::get('/{id}', [SupplierController::class, 'show']);     // menampilkan detail user
        Route::get('/{id}/edit', [SupplierController::class, 'edit']);// menampilkan halaman form edit user
        Route::put('/{id}', [SupplierController::class, 'update']);   // menyimpan perubahan data user
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);        // Menampilkan halaman form edit user Ajax
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);   // Menyimpan perubahan data user Ajax
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);  // Untuk tampilkan form confirm delete user Ajax
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // Untuk hapus data user Ajax
        Route::delete('/{id}', [SupplierController::class, 'destroy']);// menghapus data user
    });
});
