<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obat_gudangModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_gudangController extends Controller
{
    public function show_dashboard(){

        $obat = obatModel::where('jenis', 'obat')->where('jumlah_stok','<','10')->get();
        $bahan = obatModel::where('jenis', 'bahan')->where('jumlah_stok','<','10')->get();
        $alat = obatModel::where('jenis', 'alat')->where('jumlah_stok','<','10')->get();
        return view('admin_gudang.layout.dashboard',[
            'title' => 'Dashboard Pegawai Gudang',
            'obat' => $obat,
            'bahan' => $bahan,
            'alat' => $alat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_transaksi_selesai(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::get();
        // dd($pembelian);
        return view('admin_gudang.layout.transaksi_selesai',[
            'title' => 'Transaksi Selesai',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_stok_obat(){
        $obat = obat_gudangModel::where('jenis', 'obat')->get();
        $bahan = obat_gudangModel::where('jenis', 'bahan')->get();
        $alat = obat_gudangModel::where('jenis', 'alat')->get();
        return view('admin_gudang.layout.stok_obat',[
            'title' => 'Stok Gudang',
            'obat' => $obat,
            'bahan' => $bahan,
            'alat' => $alat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function permintaan(){
        $pembelianobat = pembelianModel::where('jenis','obat')->where('status' , 'menunggu p.gudang')->get();
        $pembelianbahan = pembelianModel::where('jenis','bahan')->where('status' , 'menunggu p.gudang')->get();
        $pembelianalat = pembelianModel::where('jenis','alat')->where('status' , 'menunggu p.gudang')->get();
        return view('admin_gudang.layout.permintaan_pembelian',[
            'title' => 'Permintaan Pembelian',
            'pembelianobat' => $pembelianobat,
            'pembelianbahan' => $pembelianbahan,
            'pembelianalat' => $pembelianalat,
            'getRecord' => User::find(Auth::user()->id),
            ]);
    }

    public function show_verifikasi(Request $request , $id){
        $pembelian = pembelianModel::findorFAil($id);
        $detail_pembelian = detail_pembelianModel::where('id_pembelian' , $id)->get();
        $obat_gudang = obat_gudangModel::all();
        return view('admin_gudang.layout.tampilan_verifikasi',[
            'title' => 'Verifikasi',
            'detail_pembelian' => $detail_pembelian,
            'pembelian' => $pembelian,
            'obat_gudang' => $obat_gudang,
            'getRecord' => User::find(Auth::user()->id),

            ]);
    }


}
