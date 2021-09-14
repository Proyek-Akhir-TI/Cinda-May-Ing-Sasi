<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class daftarController extends Controller
{
//Pelanggan
    public function beranda()
    {
        return view('beranda');
    }

    public function daftar()
    {
        return view('PLG/daftar');
    }

    public function loginPlg()
    {
        return view('PLG/loginPlg');
    }

    public function formulirr()
    {
        // // return view('PLG/formulir');

        $isi = DB::table('forms')->get();
        
        // // dd($forms); // ini lebih detail untuk cek
        // // return $forms;
        return view('PLG/formulir', ['isi' => $isi]);
    }

    // public function formulirr() 
    // {
        
    //     $isi = DB::table('forms')->where('id', $id)->first();
    //     return view('PLG/formulirr', compact('isi'));

    // }
    
    // public function form() 
    // {

    //     DB::table('forms')
    //     ->insert([
    //         'nama' => $isi->nama, 
    //         'alamat' => $isi->alamat,
    //         'no_Telp' => $isi->no_Telp,
    //         'email' => $isi->email,
    //         'layanan' => $isi->layanan,
    //         'waktu' => $isi->waktu,
    //         'tipe_Mobil' => $isi->tipe_Mobil,
    //         'no_Plat' => $isi->no_Plat
    //     ]);

        // $isi = DB::table('forms')->insert([ //pelaporan disini adalah nama tabel pd database
            // 'nama' => $isi->nama, 
            // 'alamat' => $isi->alamat,
            // 'no_Telp' => $isi->no_Telp,
            // 'email' => $isi->email,
            // 'layanan' => $isi->layanan,
            // 'waktu' => $isi->waktu,
            // 'tipe_Mobil' => $isi->tipe_Mobil,
            // 'no_Plat' => $isi->no_Plat
        // ]);
    // }

    public function layanan()
    {
        return view('PLG/layanan');
    }

    public function layanan2()
    {
        return view('PLG/layanan2');
    }

    public function tentangKami()
    {
        return view('PLG/tentangKami');
    }
    public function progres()
    {
        return view('PLG/progres');
    }
// Admin
    public function berandaAdmin()
    {
        return view('ADMIN/berandaAdmin');
    }
    
    public function layananAdmin()
    {
        return view('ADMIN/layananAdmin');
    }

    public function loginAdmin()
    {
        return view('ADMIN/loginAdmin');
    }

    public function jadwal()
    {
        $isi = DB::table('forms')->get();

        // dd($isi);
        return view('ADMIN/jadwal', ['isi' => $isi]);
    }

    public function editJdwl($id)
    {
        $edit = DB::table('forms')->where('id', $id)->first();
        return view('ADMIN/editJdwl', compact('edit'));
    }
   
    public function editJdwlP(Request $edit, $id)
    {
        DB::table('forms')->where('id', $id)
        ->update([
            'nama' => $edit->nama, 
            'alamat' => $edit->alamat,
            'no_Telp' => $edit->no_Telp,
            'email' => $edit->email,
            'layanan' => $edit->layanan,
            'waktu' => $edit->waktu,
            'tipe_Mobil' => $edit->tipe_Mobil,
            'no_Plat' => $edit->no_Plat
        ]);
        return redirect('jadwal')->with('status', 'Data Pelanggan Berhasil Diupdate!'); 
    }

    public function buang($id)
    {
        DB::table('forms')->where('id', $id)->delete();
        return redirect('jadwal')->with('status', 'Data Pelanggan Berhasil Dihapus!');
    }


//Pelaporan
    public function pelaporan()
    {
        $rekap = DB::table('pelaporans')->get();

        // dd($pelaporans); // ini lebih detail untuk cek
        // return $pelaporans;
        return view('ADMIN/pelaporan', ['rekap' => $rekap]); //catatan : yang ada didalam array adalah nama variable
    }

    public function tambah()
    {
        return view('ADMIN/tambah');
    }

    public function tambahProses(Request $rekap)
    {
        DB::table('pelaporans')->insert([ //pelaporan disini adalah nama tabel pd database
            'name' => $rekap->name, 
            'waktu' => $rekap->waktu,
            'tipe_Mobil' => $rekap->tipe_Mobil,
            'no_Plat' => $rekap->no_Plat,
            'status' => $rekap->status  
        ]);

        return redirect('pelaporan')->with('status', 'Data Pelanggan Berhasil Ditambahkan!'); //pelaporan ini adalah diarahkan atau dialamatkan ke halaman pelaporan
    }

    public function edit($id)
    {
        $ubah = DB::table('pelaporans')->where('id', $id)->first();
        return view('ADMIN/edit', compact('ubah'));
    }

    public function editProses(Request $ubah, $id)
    {
        DB::table('pelaporans')->where('id', $id)
        ->update([
            'name' => $ubah->name, 
            'waktu' => $ubah->waktu,
            'tipe_Mobil' => $ubah->tipe_Mobil,
            'no_Plat' => $ubah->no_Plat,
            'status' => $ubah->status
        ]);
        return redirect('pelaporan')->with('status', 'Data Pelanggan Berhasil Diupdate!'); 
    }

    public function hapus($id)
    {
        DB::table('pelaporans')->where('id', $id)->delete();
        return redirect('pelaporan')->with('status', 'Data Pelanggan Berhasil Dihapus!');
    }

    public function tentangKamiAdmin()
    {
        return view('ADMIN/tentangKamiAdmin');
    }

    public function progresAdm()
    {
        return view('ADMIN/progresAdm');
    }
}
