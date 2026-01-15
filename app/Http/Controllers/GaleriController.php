<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('galeri.index', compact('galeris'));
    }

    public function create()
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa menambah galeri.');
    }

    return view('galeri.create');
}

public function store(Request $request)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa menambah galeri.');
    }

    $validated = $request->validate([
        'judul' => 'required',
        'kegiatan' => 'required',
        'tanggal' => 'nullable|date',
        'foto' => 'required|image|max:2048',
    ]);

    $fotoPath = $request->file('foto')->store('galeri', 'public');

    Galeri::create([
        'judul' => $validated['judul'],
        'kegiatan' => $validated['kegiatan'],
        'tanggal' => $validated['tanggal'],
        'foto' => $fotoPath,
    ]);

    return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
}

public function edit(Galeri $galeri)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa mengedit galeri.');
    }

    return view('galeri.edit', compact('galeri'));
}

public function update(Request $request, Galeri $galeri)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa mengupdate galeri.');
    }

    $validated = $request->validate([
        'judul' => 'required',
        'kegiatan' => 'required',
        'tanggal' => 'nullable|date',
        'foto' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('galeri', 'public');
        $galeri->foto = $fotoPath;
    }

    $galeri->update([
        'judul' => $validated['judul'],
        'kegiatan' => $validated['kegiatan'],
        'tanggal' => $validated['tanggal'],
        'foto' => $galeri->foto,
    ]);

    return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');
}

public function destroy(Galeri $galeri)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa menghapus galeri.');
    }

    $galeri->delete();
    return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
}

public function show(Galeri $galeri)
{
    return view('galeri.show', compact('galeri'));
}

}