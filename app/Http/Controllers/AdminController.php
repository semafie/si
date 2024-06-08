<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use PDF;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show_dashboard(){
        return view('admin.layout.dashboard',[
            'title' => 'Dashboard'
        ]);
    }
    

    public function show_semua_obat(){
        $obat = obatModel::all();
        return view('admin.layout.stok_obat',[
            'title' => 'Semua stok Obat',
            'obat' => $obat
        ]);
    }

    public function show_beli_obat(){
        $pembelian = pembelianModel::latest()->first();
        $newIdPembelian = $pembelian ? $pembelian->id + 1 : 1;

    // Dapatkan detail_pembelian dengan id_pembelian yang baru
    $detail_pembelian = detail_pembelianModel::where('id_pembelian', $newIdPembelian)->get();
        $obat = obatModel::all();
        return view('admin.layout.beli_obat',[
            'title' => 'Beli Obat',
            'obat' => $obat,
            'detail_pembelian' => $detail_pembelian
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
        ]);
    }

    public function show_transaksi_menunggu(){
        $pembelian = pembelianModel::where('status' , 'menunggu p.gudang')->get();
        $detail_pembelian = detail_pembelianModel::where('status' , 'menunggu p.gudang')->get();
        return view('admin.layout.transaksi_menunggu',[
            'title' => 'Transaksi Menunggu',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }
    public function show_transaksi_selesai(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::get();
        return view('admin.layout.transaksi_selesai',[
            'title' => 'Transaksi selesai',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }
}
