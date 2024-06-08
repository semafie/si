<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\pembelianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pembelianController extends Controller
{
    public function tambahTransaksi(Request $request)
    {
        $obat = pembelianModel::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'total_harga' => $request->total_harga,
            'status' => 'menunggu p.gudang'
        ]);

        if($obat){
            return redirect()->route('admin_beli_obat')->with(Session::flash('berhasil_tambah', true));
        } else{
            return redirect()->route('admin_beli_obat')->with(Session::flash('gagal_tambah', true));
        }
    }
}
