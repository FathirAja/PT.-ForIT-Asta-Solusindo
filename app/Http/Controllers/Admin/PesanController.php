<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesan = Pesan::latest()->get();
        return view('admin.pesan.index', compact('pesan'));
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect()->route('admin.pesan.index')->with('sukses', 'Pesan berhasil dihapus');
    }
}
