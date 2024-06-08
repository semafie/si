<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{

    public function __construct()
    {
        $adminData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'admin_kepala',
                'email' => 'admin_kepala@gmail.com',
                'role' => 'admin_kepala',
                'password' => Hash::make('admin_kepala123'),
            ],
            [
                'name' => 'admin_gudang',
                'email' => 'admin_gudang@gmail.com',
                'role' => 'admin_gudang',
                'password' => Hash::make('admin_gudang123'),
            ]
        ];
    
        // Menambahkan akun admin baru jika belum ada
        foreach ($adminData as $admin) {
            $existingAdmin = User::where('email', $admin['email'])->first();
            if (!$existingAdmin) {
                User::create([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'role' => $admin['role'],
                    'password' => $admin['password'],
                ]);
            }
        }
    }
    
    public function show_login(){
        return view('welcome');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password'); // Hanya ambil email dan password
    
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
            
            // Jika ingin mengecek peran pengguna
            if (Auth::user()->role == 'admin_kepala') {

                return redirect()->intended('/admin_kepala/dashboard');
                // Lakukan sesuatu
            }elseif(Auth::user()->role == 'admin'){
                return redirect()->intended('/admin/dashboard')->with(Session::flash('success_message', true));
            }
            elseif(Auth::user()->role == 'admin_gudang'){
                return redirect()->intended('/admin/dashboard')->with(Session::flash('berhasil_login', true));
            }

        } else {
            return redirect()->back()->with('error')->with(Session::flash('gagal_login', true));
            // Autentikasi gagal
            // Lakukan sesuatu, misalnya kembali ke halaman login dengan pesan error
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('login'));
    }
}
