<?php

use App\Http\Controllers\Admin_gudangController;
use App\Http\Controllers\Admin_kepalaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\akunCotroller;
use App\Http\Controllers\detail_pembelianController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\obatController;
use App\Http\Controllers\pembelianController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class,'show_login'])->name('tampilan_login');

Route::post('/login',[homeController::class, 'login'])->name('login');
Route::get('/logout',[homeController::class, 'logout'])->name('logout');

Route::get('/email', function () {
    return view('email');
});

Route::get('/nyobak', function () {
    return view('nyobak');
});

Route::group(['middleware' => 'admin'], function(){

        Route::get('/admin/dashboard',[AdminController::class, 'show_dashboard'])->name('admin_dashboard');
        Route::post('/admin/pembelian/tambahobat',[pembelianController::class, 'tambahTransaksiobat'])->name('admin_pembelian_tambahobat');
        Route::post('/admin/pembelian/tambahbahan',[pembelianController::class, 'tambahTransaksibahan'])->name('admin_pembelian_tambahbahan');
        Route::post('/admin/pembelian/tambahalat',[pembelianController::class, 'tambahTransaksialat'])->name('admin_pembelian_tambahalat');


        Route::get('/admin/obat_Menipis',[AdminController::class, 'show_obat_menipis'])->name('admin_menipiss');
        Route::get('/admin/transaksi_menunggu',[AdminController::class, 'show_transaksi_menunggu'])->name('transaksi_menunggu');
        Route::get('/admin/transaksi_selesai',[AdminController::class, 'show_transaksi_selesai'])->name('transaksi_selesai');

        Route::get('/admin/obat',[AdminController::class, 'show_semua_obat'])->name('admin_obat');
        


        Route::post('/admin/obat/tambahobat',[obatController::class, 'tambahobat'])->name('admin_tambah_obat');
        Route::post('/admin/tambahbahan',[obatController::class, 'tambahbahan'])->name('admin_bahan_tambah');
        Route::post('/admin/tambahalat',[obatController::class, 'tambahalat'])->name('admin_alat_tambah');

        Route::put('/admin/obat/edit/{id}',[obatController::class, 'edit'])->name('admin_edit_obat');
        Route::delete('/admin/obat/hapus/{id}',[obatController::class, 'hapus'])->name('admin_hapus_obat');


        Route::get('/admin/beli_obat',[AdminController::class, 'show_beli_obat'])->name('admin_beli_obat');
        Route::post('/admin/detail_pembelian/tambahobat',[detail_pembelianController::class, 'tambahdetailobat']);
        Route::post('/admin/detail_pembelian/tambahbahan',[detail_pembelianController::class, 'tambahdetailbahan']);
        Route::post('/admin/detail_pembelian/tambahalat',[detail_pembelianController::class, 'tambahdetailalat']);

Route::delete('/admin/detail_pemebelian/hapus/{id}',[detail_pembelianController::class, 'hapusdetail'])->name('admin_detail_pembelian_edit');

});
Route::put('/cetaklaporans/{id}',[AdminController::class, 'laporans'])->name('laporans');
// Route::get('/laporan',[AdminController::class, 'laporan'])->name('laporan');

Route::group(['middleware' => 'admin_kepala'], function(){


Route::get('/admin_kepala/dashboard',[Admin_kepalaController::class, 'show_dashboard'])->name('admin_kepala_dashboard');
Route::get('/admin_kepala/akun_admin',[Admin_kepalaController::class, 'show_akunadmin'])->name('kepala_akunadmin');
Route::post('/admin_kepala/akun_admin/tambah',[akunCotroller::class, 'tambah_p_farmasi'])->name('kepala_akunadmin_tambah');
Route::put('/admin_kepala/akun_admin/edit/{id}',[akunCotroller::class, 'edit_p_farmasi'])->name('kepala_akunadmin_edit');
Route::delete('/admin_kepala/akun_admin/hapus/{id}',[akunCotroller::class, 'hapus_p_farmasi'])->name('kepala_akunadmin_hapus');

Route::get('/admin_kepala/akun_farmasi',[Admin_kepalaController::class, 'show_akungudang'])->name('kepala_akungudang');
Route::post('/admin_kepala/akun_farmasi/tambah',[akunCotroller::class, 'tambah_p_gudang'])->name('kepala_akungudang_tambah');
Route::put('/admin_kepala/akun_farmasi/edit/{id}',[akunCotroller::class, 'edit_p_gudang'])->name('kepala_akungudang_edit');
Route::delete('/admin_kepala/akun_farmasi/hapus/{id}',[akunCotroller::class, 'hapus_p_gudang'])->name('kepala_akungudang_hapus');

Route::get('/admin_kepala/transaksi_menunggu',[Admin_kepalaController::class, 'show_transaksi_menunggu'])->name('kepala_transaksi_menunggu');
Route::get('/admin_kepala/transaksi_selesai',[Admin_kepalaController::class, 'show_transaksi_selesai'])->name('kepalatra_selesai');

});


Route::group(['middleware' => 'admin_gudang'], function(){

Route::get('/admin_gudang/dashboard',[Admin_gudangController::class, 'show_dashboard'])->name('admin_gudang_dashboard');
Route::get('/admin_gudang/stok_obat',[Admin_gudangController::class, 'show_stok_obat'])->name('gudang_stok_obat');
Route::put('/admin_gudang/stok_obat/edit/{id}',[obatController::class, 'edit_stok_obat'])->name('editgudang_stok_obat');

Route::get('/admin_gudang/permintaan',[Admin_gudangController::class, 'permintaan'])->name('gudang_spermintaan');
Route::put('/admin/verifikasi/tambah/{id}',[pembelianController::class, 'verifikasi'])->name('admin_verifikasi');
Route::put('/verifikasipermintaan/{id}',[Admin_gudangController::class, 'show_verifikasi'])->name('gudang_sverifikasi');

Route::get('/admin_gudang/transaksi_selesai',[Admin_gudangController::class, 'show_transaksi_selesai'])->name('gudangtra_selesai');

});