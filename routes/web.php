<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\obatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard',[AdminController::class, 'show_dashboard'])->name('admin_dashboard');
Route::get('/admin/obat',[AdminController::class, 'show_semua_obat'])->name('admin_obat');
Route::post('/admin/obat/tambah',[obatController::class, 'tambah'])->name('admin_tambah_obat');
