<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        return view('admin.tentang-kami.index');
    }
}
