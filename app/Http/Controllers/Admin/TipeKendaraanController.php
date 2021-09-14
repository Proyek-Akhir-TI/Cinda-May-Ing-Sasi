<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipeKendaraan;
use Illuminate\Http\Request;

class TipeKendaraanController extends Controller
{
    public function index()
    {
        $tipeKendaraan = TipeKendaraan::all();
        return view('admin.tipe-kendaraan.index', compact('tipeKendaraan'));
    }
    public function store(Request $request)
    {
        TipeKendaraan::create($request->all());
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        TipeKendaraan::find($request->id)->update($request->all());
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete(Request $request)
    {
        TipeKendaraan::find($request->id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
