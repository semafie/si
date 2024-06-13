<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obat_gudangModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pembelianController extends Controller
{
    public function tambahTransaksiobat(Request $request)
    {
        $obat = pembelianModel::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'total_harga' => $request->total_harga,
            'status' => 'menunggu p.gudang',
            'jenis' => 'obat',
        ]);

        if($obat){
            return redirect()->route('admin_beli_obat')->with(Session::flash('berhasil_tambah', true));
        } else{
            return redirect()->route('admin_beli_obat')->with(Session::flash('gagal_tambah', true));
        }
    }
    public function tambahTransaksibahan(Request $request)
    {
        $obat = pembelianModel::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'total_harga' => $request->total_harga,
            'status' => 'menunggu p.gudang',
            'jenis' => 'bahan',
        ]);

        if($obat){
            return redirect()->route('admin_beli_obat')->with(Session::flash('berhasil_tambah', true));
        } else{
            return redirect()->route('admin_beli_obat')->with(Session::flash('gagal_tambah', true));
        }
    }
    public function tambahTransaksialat(Request $request)
    {
        $obat = pembelianModel::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'total_harga' => $request->total_harga,
            'status' => 'menunggu p.gudang',
            'jenis' => 'alat',
        ]);

        if($obat){
            return redirect()->route('admin_beli_obat')->with(Session::flash('berhasil_tambah', true));
        } else{
            return redirect()->route('admin_beli_obat')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function verifikasi(Request $request , $id){

        // dd($request->all());

        $pembelian = pembelianModel::findorFAil($request->id_pembelian);
        $pembelian->total_harga = $request->total_harga;
        $pembelian->status = 'Selesai';

        $pembelian->save();

        $detail_pembelian = detail_pembelianModel::where('id_pembelian' , $request->id_pembelian)->get();
        // dd($detail_pembelian);
        foreach ($detail_pembelian as $detail) {
            // Cari obat berdasarkan id_obat dari detail pembelian
            // $detail->status = 'sele'
            
            $obat_gudang = obat_gudangModel::find($detail->id_obat);
            $obat = obatModel::find($detail->id_obat);
            
            if ($obat) {
                if($detail->jumlah_stok <= $obat_gudang->jumlah_stok){
                    $detail->status = 'diterima';
                    $detail->save();
                    $obat->jumlah_stok += $detail->jumlah_stok;
                    $obat->save();
                } else {
                    $detail->status = 'ditolak';
                    $detail->save();
                }
            }
    
            // Jika obat ditemukan, kurangi jumlah stoknya
            if ($obat_gudang) {
                if($detail->jumlah_stok <= $obat_gudang->jumlah_stok){
                    $obat_gudang->jumlah_stok -= $detail->jumlah_stok;
                    $obat_gudang->save();
                }
            }
        }
        return redirect()->route('gudang_spermintaan')->with(Session::flash('gagal_tambah', true));


        

        // $obat = obatModel::all();
        // dd($request->all());


    }
}
