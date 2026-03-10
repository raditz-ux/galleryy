<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\KomentarFoto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $foto = Foto::all();
        return view('admin.dashboard', compact('foto'));
    }

    public function create()
    {
        return view('admin.tambah');
    }

    public function store(Request $request)
    {
        $file = $request->file('foto');
        $nama = time() . "_" . $file->getClientOriginalName();
        $file->move('foto', $nama);

        Foto::create([
            'JudulFoto'      => $request->judul,
            'DeskripsiFoto'  => $request->deskripsi,
            'TanggalUnggah'  => date('Y-m-d'),
            'LokasiFile'     => $nama,
            'AlbumID'        => 1, 
            'UserID'         => session('UserID')
        ]);

        return redirect('/admin')->with('success', 'Foto berhasil ditambah!');
    }

    public function edit($id)
    {
        $foto = Foto::find($id);
        return view('admin.edit', compact('foto'));
    }

    public function update(Request $request, $id)
    {
        $foto = Foto::find($id);

        $foto->JudulFoto = $request->judul;
        $foto->DeskripsiFoto = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = time() . "_" . $file->getClientOriginalName();
            $file->move('foto', $nama);

            $foto->LokasiFile = $nama;
        }

        $foto->save();

        return redirect('/admin')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Foto::destroy($id);
        return back()->with('success', 'Foto telah dihapus.');
    }

    public function komentar(Request $request, $id)
    {
        KomentarFoto::create([
            'FotoID'          => $id,
            'UserID'          => session('UserID'),
            'IsiKomentar'     => $request->komentar,
            'TanggalKomentar' => date('Y-m-d')
        ]);

        return back()->with('success', 'Komentar ditambahkan.');
    }
}