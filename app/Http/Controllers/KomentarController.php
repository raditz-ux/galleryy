<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    // Menyimpan komentar baru
    public function store(Request $request, $id)
    {
        KomentarFoto::create([
            'FotoID' => $id,
            'UserID' => session('UserID'),
            'IsiKomentar' => $request->komentar,
            'TanggalKomentar' => date('Y-m-d')
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }

    // Menghapus komentar
    public function hapus($id)
    {
        $komentar = KomentarFoto::find($id);

        if ($komentar) {
            $komentar->delete();
            return back()->with('success', 'Komentar berhasil dihapus');
        }

        return back()->with('error', 'Komentar tidak ditemukan');
    }
}