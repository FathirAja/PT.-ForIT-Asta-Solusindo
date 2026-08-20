<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Pesan;
use App\Models\PesananPaket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $layanan = Layanan::latest()->take(6)->get();
        return view('public.home', compact('layanan'));
    }

    public function tentang()
    {
        return view('public.tentang');
    }

    public function layanan()
    {
        $layanan = Layanan::with(['pakets' => function ($query) {
            $query->orderBy('urutan');
        }])->get();

        return view('public.layanan', compact('layanan'));
    }

    public function tentangDeveloper()
    {
        return view('public.tentang-developer');
    }

    public function formPesanPaket(Paket $paket)
    {
        return view('public.pesan-paket', compact('paket'));
    }

    public function pesanPaket(Request $request, Paket $paket)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $pesanan = PesananPaket::create([
            'paket_id' => $paket->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'catatan' => $request->catatan,
            'status' => 'baru',
        ]);

        return redirect()->route('pesanan.bukti', $pesanan)->with('sukses', 'Pesanan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }

    public function buktiPesanan(PesananPaket $pesananPaket)
    {
        $pesananPaket->load('paket.layanan');

        if (request()->has('download')) {
            $pdf = Pdf::loadView('public.bukti-pdf', compact('pesananPaket'));
            return $pdf->download('Bukti-Pemesanan-' . $pesananPaket->id . '.pdf');
        }

        return view('public.bukti-pesanan', compact('pesananPaket'));
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    public function kirimPesan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'subjek' => 'required|string|max:200',
            'pesan' => 'required|string',
        ]);

        Pesan::create($request->only('nama', 'email', 'subjek', 'pesan'));

        return back()->with('sukses', 'Pesan Anda berhasil dikirim!');
    }
}
