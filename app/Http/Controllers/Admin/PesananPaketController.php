<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesananPaket;
use Illuminate\Http\Request;

class PesananPaketController extends Controller
{
    public function index()
    {
        $pesanan = PesananPaket::with('paket.layanan')->latest()->get();
        return view('admin.pesanan-paket.index', compact('pesanan'));
    }

    public function updateStatus(Request $request, PesananPaket $pesananPaket)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai,batal',
        ]);

        $pesananPaket->update(['status' => $request->status]);

        return back()->with('sukses', 'Status pesanan berhasil diperbarui');
    }

    public function destroy(PesananPaket $pesananPaket)
    {
        $pesananPaket->delete();

        return redirect()->route('admin.pesanan-paket.index')->with('sukses', 'Pesanan berhasil dihapus');
    }
}
