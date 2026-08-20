<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
  public function index()
  {
    $paket = Paket::with('layanan')->orderBy('layanan_id')->orderBy('urutan')->get();
    return view('admin.paket.index', compact('paket'));
  }

  public function create()
  {
    $layananList = Layanan::all();
    return view('admin.paket.create', compact('layananList'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'layanan_id' => 'required|exists:layanans,id',
      'nama_paket' => 'required|string|max:100',
      'kecepatan' => 'nullable|string|max:50',
      'harga' => 'required|numeric|min:0',
      'tipe' => 'required|string|max:50',
      'warna' => 'required|string|max:20',
      'urutan' => 'nullable|integer',
    ]);

    Paket::create($request->only('layanan_id', 'nama_paket', 'kecepatan', 'harga', 'tipe', 'warna', 'urutan'));

    return redirect()->route('admin.paket.index')->with('sukses', 'Paket berhasil ditambahkan');
  }

  public function edit(Paket $paket)
  {
    $layananList = Layanan::all();
    return view('admin.paket.edit', compact('paket', 'layananList'));
  }

  public function update(Request $request, Paket $paket)
  {
    $request->validate([
      'layanan_id' => 'required|exists:layanans,id',
      'nama_paket' => 'required|string|max:100',
      'kecepatan' => 'nullable|string|max:50',
      'harga' => 'required|numeric|min:0',
      'tipe' => 'required|string|max:50',
      'warna' => 'required|string|max:20',
      'urutan' => 'nullable|integer',
    ]);

    $paket->update($request->only('layanan_id', 'nama_paket', 'kecepatan', 'harga', 'tipe', 'warna', 'urutan'));

    return redirect()->route('admin.paket.index')->with('sukses', 'Paket berhasil diupdate');
  }

  public function destroy(Paket $paket)
  {
    $paket->delete();

    return redirect()->route('admin.paket.index')->with('sukses', 'Paket berhasil dihapus');
  }
}
