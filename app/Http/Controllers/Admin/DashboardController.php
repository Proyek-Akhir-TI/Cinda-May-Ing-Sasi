<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::count();
        $menunggu = Transaksi::where('status','menunggu')->count();
        $diproses = Transaksi::where('status','diproses')->count();
        $selesai = Transaksi::where('status','selesai')->count();
        return view('admin.dashboard.index', compact('pelanggan','menunggu','diproses','selesai'));
    }
}
