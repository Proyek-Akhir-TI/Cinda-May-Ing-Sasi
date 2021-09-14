<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use App\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function layanan()
    {
        $layanan = Layanan::all();
        return view('landing.layanan', compact('layanan'));
    }
    public function tentang()
    {
        return view('landing.tentang');
    }
    public function progres()
    {
        return view('landing.progres');
    }
    public function daftar()
    {
        return view('landing.daftar');
    }
    public function daftarStore(Request $request)
    {
        $requestAll = $request->all();
        $requestAll['password'] = bcrypt($request->password);
        Pelanggan::create($requestAll);
        return redirect(route('pelanggan.loginForm'))->with('success','Akun Anda berhasil terdaftar.');
    }
}
