<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use App\Models\User;
use Illuminate\Http\Request;

class Admin_kepalaController extends Controller
{
    public function show_dashboard(){

        $obat = obatModel::where('jenis', 'obat')->where('jumlah_stok','<','10')->get();
        $bahan = obatModel::where('jenis', 'bahan')->where('jumlah_stok','<','10')->get();
        $alat = obatModel::where('jenis', 'alat')->where('jumlah_stok','<','10')->get();
        return view('admin_kepala.layout.dashboard',[
            'title' => 'Dashboard kepala',
            'obat' => $obat,
            'bahan' => $bahan,
            'alat' => $alat
        ]);
    }
    public function show_akunadmin(){
        $user = User::where('role' , 'admin')->get();
        return view('admin_kepala.layout.akun_p_farmasi',[
            'title' => 'akun Pegawai Farmasi',
            'user'=> $user
        ]);
    }
    public function show_akungudang(){
        $user = User::where('role' , 'admin_gudang')->get();
        return view('admin_kepala.layout.akun_p_gudang',[
            'title' => 'akun pegawai gudang',
            'user' => $user,
        ]);
    }

    public function show_transaksi_menunggu(){
        $pembelian = pembelianModel::where('status' , 'menunggu p.gudang')->get();
        $detail_pembelian = detail_pembelianModel::where('status' , 'menunggu p.gudang')->get();
        return view('admin_kepala.layout.transaksi_menunggu',[
            'title' => 'Transaksi Menunggu',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }
    public function show_transaksi_selesai(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::get();
        return view('admin_kepala.layout.transaksi_selesai',[
            'title' => 'Transaksi selesai',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }
}
