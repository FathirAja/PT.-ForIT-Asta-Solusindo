<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Pesan;
use App\Models\PesananPaket;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLayanan = Layanan::count();
        $totalPesan = Pesan::count();
        $totalPaket = Paket::count();
        $totalPesananBaru = PesananPaket::where('status', 'baru')->count();

        return view('admin.dashboard', compact('totalLayanan', 'totalPesan', 'totalPaket', 'totalPesananBaru'));
    }
}
