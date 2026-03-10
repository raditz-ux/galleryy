<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->first();

        $foto = $admin ? Foto::where('UserID', $admin->UserID)->get() : collect();

        return view('user.dashboard', compact('foto'));
    }

    public function create()
    {
        $album = Album::all();
        return view('upload', compact('album'));
    }

    public function store(Request $request)
    {
        $file = $request->file('foto');
        $nama = time() . "_" . $file->getClientOriginalName();
        $file->move('foto', $nama);

        Foto::create([
            'JudulFoto'     => $request->judul,
            'DeskripsiFoto' => $request->deskripsi,
            'TanggalUnggah' => date('Y-m-d'),
            'LokasiFile'    => $nama,
            'AlbumID'       => $request->album,
            'UserID'        => session('UserID')
        ]);

        return redirect('/')->with('success', 'Foto berhasil diunggah!');
    }
}