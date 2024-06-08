<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obat_gudangModel;
use App\Models\pembelianModel;
use Illuminate\Http\Request;

class Admin_gudangController extends Controller
{
    public function show_dashboard(){
        return view('admin_gudang.layout.dashboard',[
            'title' => 'Dashboard Pegawai Gudang'
        ]);
    }

    public function show_transaksi_selesai(){
        $pembelian = detail_pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::get();
        return view('admin_gudang.layout.transaksi_selesai',[
            'title' => 'Transaksi selesai',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }

    public function show_stok_obat(){
        $obat = obat_gudangModel::all();
        return view('admin_gudang.layout.stok_obat',[
            'title' => 'stok obat gudang',
            'obat' => $obat
        ]);
    }

    public function permintaan(){
        $pembelian = pembelianModel::where('status' , 'menunggu p.gudang')->get();
        return view('admin_gudang.layout.permintaan_pembelian',[
            'title' => 'permintaan obat',
            'pembelian' => $pembelian
            ]);
    }
    public function show_verifikasi(Request $request , $id){
        $pembelian = pembelianModel::findorFAil($id);
        $detail_pembelian = detail_pembelianModel::where('id_pembelian' , $id)->get();
        $obat_gudang = obat_gudangModel::all();
        return view('admin_gudang.layout.tampilan_verifikasi',[
            'title' => 'permintaan obat',
            'detail_pembelian' => $detail_pembelian,
            'pembelian' => $pembelian,
            'obat_gudang' => $obat_gudang,

            ]);
    }


}
