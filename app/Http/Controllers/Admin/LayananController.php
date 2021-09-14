<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('admin.layanan.index', compact('layanan'));
    }
    public function store(Request $request)
    {
        Layanan::create($request->all());
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }
    public function update(Request $request)
    {
        Layanan::find($request->id)->update($request->all());
        return redirect()->back()->with('success','Data berhasil diubah');
    }
    public function delete(Request $request)
    {
        Layanan::find($request->id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
