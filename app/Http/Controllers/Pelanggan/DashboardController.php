<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $menunggu = Transaksi::where('status','menunggu')->where('pelanggan_id', Auth::guard(session()->get('role'))->user()->id)->count();
        $diproses = Transaksi::where('status','diproses')->where('pelanggan_id', Auth::guard(session()->get('role'))->user()->id)->count();
        $selesai = Transaksi::where('status','selesai')->where('pelanggan_id', Auth::guard(session()->get('role'))->user()->id)->count();

        $transaksi = Transaksi::where('status','menunggu')->get();
        return view('pelanggan.dashboard.index', compact('menunggu','diproses','selesai','transaksi'));
    }
}
