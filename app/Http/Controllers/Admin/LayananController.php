<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::latest()->get();
        return view('admin.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
        ]);

        Layanan::create($request->only('nama', 'deskripsi', 'icon'));

        return redirect()->route('admin.layanan.index')->with('sukses', 'Layanan berhasil ditambahkan');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
        ]);

        $layanan->update($request->only('nama', 'deskripsi', 'icon'));

        return redirect()->route('admin.layanan.index')->with('sukses', 'Layanan berhasil diupdate');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('sukses', 'Layanan berhasil dihapus');
    }
}
