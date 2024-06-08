<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class akunCotroller extends Controller
{


    public function tambah_p_farmasi(Request $request){
        $halo = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ];

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('kepala_akunadmin')->with(Session::flash('kosong_tambah', true));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'admin',
        ]);


        if ($user) {
            return redirect()->route('kepala_akunadmin')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('kepala_akunadmin')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit_p_farmasi(Request $request, $id){
        $user = User::findorFAil($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;

        $user->save();

        // if ($user) {
            return redirect()->route('kepala_akunadmin')->with(Session::flash('berhasil_edit', true));
        // } else {
        //     return redirect()->route('kepala_akunadmin')->with(Session::flash('gagal_edit', true));
        // }
    }

    public function hapus_p_farmasi(Request $request, $id){
        $user = User::findorFAil($id);

        $user->delete();

        // if ($user) {
            return redirect()->route('kepala_akunadmin')->with(Session::flash('berhasil_hapus', true));
        // } else {
        //     return redirect()->route('kepala_akunadmin')->with(Session::flash('gagal_hapus', true));
        // }
    }
    public function tambah_p_gudang(Request $request){
        $halo = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ];

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('kepala_akungudang')->with(Session::flash('kosong_tambah', true));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'admin_gudang',
        ]);


        if ($user) {
            return redirect()->route('kepala_akungudang')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('kepala_akungudang')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit_p_gudang(Request $request, $id){
        $user = User::findorFAil($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;

        $user->save();

        // if ($user) {
            return redirect()->route('kepala_akungudang')->with(Session::flash('berhasil_edit', true));
        // } else {
        //     return redirect()->route('kepala_akungudang')->with(Session::flash('gagal_edit', true));
        // }
    }

    public function hapus_p_gudang(Request $request, $id){
        $user = User::findorFAil($id);

        $user->delete();

        // if ($user) {
            return redirect()->route('kepala_akungudang')->with(Session::flash('berhasil_hapus', true));
        // } else {
        //     return redirect()->route('kepala_akunadmin')->with(Session::flash('gagal_hapus', true));
        // }
    }
}
