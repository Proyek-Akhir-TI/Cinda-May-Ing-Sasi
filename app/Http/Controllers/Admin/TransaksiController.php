<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{Transaksi, Pelanggan, Layanan, TipeKendaraan, TransaksiLayanan};

class TransaksiController extends Controller
{
    public function index()
    {
        // $transaksi = Transaksi::all();
        $transaksi = Transaksi::with('layanan')->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $layanan = Layanan::all();
        $jenisKendaraan = TipeKendaraan::all();
        return view('admin.transaksi.create', compact('pelanggan', 'layanan', 'jenisKendaraan'));
    }

    public function edit(Transaksi $id)
    {
        return view('admin.transaksi.edit', [
            'transaksi' => $id,
            'layanan' => Layanan::all(),
            'jenisKendaraan' => TipeKendaraan::all(),
            'selected' => $id->transaksiLayanan()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => ['required'],
            'tipe' => ['required', 'string'],
            'plat' => ['required', 'string'],
            'layanan' => ['required', 'array'],
            'layanan.*' => ['required', Rule::exists(Layanan::class, 'id') ],
            'tipe_kendaraan_id' => ['required', Rule::exists(TipeKendaraan::class, 'id')],
            'waktu' => ['required', 'after_or_equal:now'],
        ]);

        $layanan = $request->input('layanan');
        /**
         * membuat transaksi baru
         */
        tap(Transaksi::create(
            $request->only([
                'pelanggan_id','tipe', 'plat', 'alamat', 'no_telp', 'tipe_kendaraan_id', 'waktu'])
        ), function(Transaksi $transaksi) use ($layanan){
            foreach ($layanan as $key){
                TransaksiLayanan::create([
                    'transaksi_id' => $transaksi->id,
                    'layanan_id' => $key
                ]);
            }
        });

        return redirect()->route('admin.transaksi.index')
        ->with('success', 'Data berhasil ditambahkan');
        // $requestAll = $request->all();
        // $requestAll['admin_id'] = Auth::guard('admin')->user()->id;
        // Transaksi::create($requestAll);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe' => ['required', 'string'],
            'plat' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string'],
            'layanan' => ['required', 'array'],
            'layanan.*' => ['required', Rule::exists(Layanan::class, 'id') ],
            'tipe_kendaraan_id' => ['required', Rule::exists(TipeKendaraan::class, 'id')],
            'waktu' => ['required', 'after_or_equal:now'],
            'status' => ['required']
        ]);

        $layanan = $request->input('layanan');
        
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->only([
            'pelanggan_id', 'tipe', 'plat', 'alamat', 'no_telp', 'tipe_kendaraan_id', 'waktu', 'alasan', 'status'
        ]));

        TransaksiLayanan::where('transaksi_id', $transaksi->id)
        ->whereNotIn('layanan_id', $layanan)
        ->delete();
        /**
         * melihat apakah didalam tabel TransaksiLayanan telah terdapat layanan_id atau belum.
         * jika terdapat layanan_id dan akan melakukan perubahan layanan maka akan dilakukan update data,
         * namun bila tidak terdapat layanan_id didalamnya maka akan dilakukan insert data layanan baru pada transaksi.
         */
        foreach($layanan as $key){
            TransaksiLayanan::updateOrCreate([
                'transaksi_id' => $transaksi->id,
                'layanan_id' => $key
            ]);
        }

        return redirect()->route('admin.transaksi.index')->with('success', 'Data berhasil diubah');
        // Transaksi::find($request->id)->update($request->all());
        // $T = Transaksi::find($request->id);
        // $requestAll = $request->all();
        // $requestAll['admin_id'] = Auth::guard('admin')->user()->id;
        // // dd( Auth::guard('admin')->user()->id)
        // $T->update($requestAll);

    }

    public function delete(Request $request)
    {
        Transaksi::find($request->id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');

        // Transaksi::findOrFail($id)->delete();
        // return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
