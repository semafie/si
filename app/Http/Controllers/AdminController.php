<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show_dashboard(){

        $obat = obatModel::where('jenis', 'obat')->where('jumlah_stok','<','10')->get();
        $bahan = obatModel::where('jenis', 'bahan')->where('jumlah_stok','<','10')->get();
        $alat = obatModel::where('jenis', 'alat')->where('jumlah_stok','<','10')->get();

        return view('admin.layout.dashboard',[
            'title' => 'Dashboard',
            'obat' => $obat,
            'bahan' => $bahan,
            'alat' => $alat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
    

    public function show_semua_obat(){
        $obat = obatModel::where('jenis', 'obat')->get();
        $bahan = obatModel::where('jenis', 'bahan')->get();
        $alat = obatModel::where('jenis', 'alat')->get();

        return view('admin.layout.stok_obat',[
            'title' => 'Semua Stok',
            'obat' => $obat,
            'bahan' => $bahan,
            'alat' => $alat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }


    public function show_beli_obat(){
        $pembelianalat = pembelianModel::where('jenis', 'alat')->latest()->first();
        $pembelianbahan = pembelianModel::where('jenis', 'bahan')->latest()->first();
        $pembelianobat = pembelianModel::where('jenis', 'obat')->latest()->first();
        $newIdPembelianobat = $pembelianobat ? $pembelianobat->id + 1 : 1;
        $newIdPembelianbahan = $pembelianbahan ? $pembelianbahan->id + 1 : 1;
        $newIdPembelianalat = $pembelianalat ? $pembelianalat->id + 1 : 1;

    // Dapatkan detail_pembelian dengan id_pembelian yang baru
    $detail_pembelianalat = detail_pembelianModel::where('jenis', 'alat')->where('id_pembelian', $newIdPembelianalat)->get();
    $detail_pembelianobat = detail_pembelianModel::where('jenis', 'obat')->where('id_pembelian', $newIdPembelianobat)->get();
    $detail_pembelianbahan = detail_pembelianModel::where('jenis', 'bahan')->where('id_pembelian', $newIdPembelianbahan)->get();
        $obat = obatModel::where('jenis' ,'obat')->get();
        $bahan = obatModel::where('jenis' ,'bahan')->get();
        $alat = obatModel::where('jenis' ,'alat')->get();
        return view('admin.layout.beli_obat',[
            'title' => 'Pembelian',
            'obat' => $obat,
            'bahan' => $bahan,
            'alat' => $alat,
            'detail_pembelianobat' => $detail_pembelianobat,
            'detail_pembelianbahan' => $detail_pembelianbahan,
            'detail_pembelianalat' => $detail_pembelianalat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function laporan(Request $request
    ){
        $widthInCm = 9;
    $widthInPoints = $widthInCm * 28.3465;
    $data = ['title' => 'Welcome to Laravel PDF generation'];

        $pdf = PDF::loadview('laporan')
                ->setPaper('A4', 'portrait');
                
        return $pdf->stream('nota_antrian.pdf');
    }

    public function laporans(Request $request, $id){

        $pembelian = pembelianModel::findorFAil($id);
        $detail_pembelian = detail_pembelianModel::where('id_pembelian' , $id)->get();
        $widthInCm = 9;
    $widthInPoints = $widthInCm * 28.3465;
    $data = ['title' => 'Welcome to Laravel PDF generation'];

        $pdf = PDF::loadview('laporan',[
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ])
                ->setPaper('A4', 'portrait');
                
        return $pdf->stream('nota_antrian.pdf');
    }

    public function show_obat_menipis(){
        $obat = obatModel::where('jumlah_stok','<', 10 )->get();
        return view('admin.layout.obat_menipis',[
            'title' => 'Obat Menipis',
            'obat' => $obat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_transaksi_menunggu(){
        $pembelian = pembelianModel::where('status' , 'menunggu p.gudang')->get();
        $detail_pembelian = detail_pembelianModel::where('status' , 'menunggu p.gudang')->get();
        return view('admin.layout.transaksi_menunggu',[
            'title' => 'Transaksi Menunggu',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
    public function show_transaksi_selesai(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::get();
        return view('admin.layout.transaksi_selesai',[
            'title' => 'Transaksi Selesai',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
}
