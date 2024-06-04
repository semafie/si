<?php

namespace App\Http\Controllers;

use App\Models\obatModel;
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
}
