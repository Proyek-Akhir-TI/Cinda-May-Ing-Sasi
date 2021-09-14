<?php

namespace App\Http\Controllers\Pelanggan;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{Layanan, TipeKendaraan, Transaksi, TransaksiLayanan};

class TransaksiController extends Controller
{
    public function index()
    {
        // $transaksi = Transaksi::where('pelanggan_id', auth::guard(session()->get('role'))->user()->id)->get();
        $transaksi = Transaksi::where('pelanggan_id', Auth::guard(session()->get('role'))->user()->id)->with('layanan')->get();
        return view('pelanggan.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $layanan = Layanan::all();
        $jenisKendaraan = TipeKendaraan::all();
        return view('pelanggan.transaksi.create', compact('layanan', 'jenisKendaraan'));
    }

    public function edit(Transaksi $id)
    {
        return view('pelanggan.transaksi.edit', [
            'transaksi' => $id,
            'layanan' => Layanan::all(),
            'jenisKendaraan' => TipeKendaraan::all(),
            'selected' => $id->transaksiLayanan()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => ['required', 'string'],
            'plat' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_telp' => ['required', 'string'],
            'layanan' => ['required', 'array'],
            'layanan.*' => ['required', Rule::exists(Layanan::class, 'id') ],
            'tipe_kendaraan_id' => ['required', Rule::exists(TipeKendaraan::class, 'id')],
            'waktu' => ['required', 'after_or_equal:now']
        ]);

        $layanan = $request->input('layanan');
        /**
         * membuat transaksi baru
         */
        tap(Transaksi::create(
            $request->only(['tipe', 'plat', 'alamat', 'no_telp', 'tipe_kendaraan_id', 'waktu'])
        ), function(Transaksi $transaksi) use ($layanan){
            foreach ($layanan as $key){
                TransaksiLayanan::create([
                    'transaksi_id' => $transaksi->id,
                    'layanan_id' => $key
                ]);
            }
        });

        return redirect()->route('pelanggan.transaksi.index')
        ->with('success', 'Data berhasil ditambahkan');

        /**
         * $request->all() tidak direkomendasikan untuk digunakan sebab berisiko akan hijack oleh pengguna (memasukan data yg tidak sesuai) //
         */
        // $requestAll = $request->all();
        // $requestAll['pelanggan_id'] = Auth::guard('pelanggan')->user()->id;
        // $requestAll['status'] = 'menunggu';
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
            'waktu' => ['required', 'after_or_equal:now']
        ]);

        $layanan = $request->input('layanan');
        
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->only([
            'tipe', 'plat', 'alamat', 'no_telp', 'tipe_kendaraan_id', 'waktu'
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
        return redirect()->route('pelanggan.transaksi.index')->with('success', 'Data berhasil diubah');
    }
    public function delete(Request $request)
    {
        // Transaksi::find($request->id)->delete();
        $T = Transaksi::find($request->id);
        $requestAll = $request->all();
        // $requestAll['pelanggan_id'] = Auth::guard('pelanggan')->user()->id;
        $requestAll['status'] = 'cancel';
        // dd(($T));
        $T->update($requestAll);

        return redirect()->back()->with('success', 'Data berhasil dicancel');
    }
}
