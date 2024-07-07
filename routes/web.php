<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\TambahBarangController;
use App\Http\Middleware\DisableCache;



Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');;


Route::get('/profil', function(){
    return view ('profil');
})->middleware('auth');

Route::get('/databarang', [BarangController::class, 'barang'])->name('databarang')->middleware('auth');;
Route::post('/hapus-barang/{id}', [BarangController::class, 'destroy'])->name('hapusBarang');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

Route::get('/klasifikasi', [KlasifikasiController::class, 'klasifikasi'])->name('klasifikasi')->middleware('auth');;
Route::post('/klasifikasi/tambah', [KlasifikasiController::class, 'tambahKlasifikasi'])->name('klasifikasi.tambah');
Route::get('/edit-klasifikasi/{id}', [KlasifikasiController::class, 'edit'])->name('editKlasifikasi');
Route::post('/update-klasifikasi/{id}', [KlasifikasiController::class, 'update'])->name('updateKlasifikasi');
Route::post('/hapus-klasifikasi/{id}', [KlasifikasiController::class, 'destroy'])->name('hapusKlasifikasi');

