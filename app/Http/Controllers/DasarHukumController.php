<?php

namespace App\Http\Controllers;

use App\Models\DasarHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DasarHukumController extends Controller
{
    public function index()
    {
        $items = DasarHukum::all();
        return view('dasar-hukum.index', compact('items'));
    }

    public function create()
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa menambah dasar hukum.');
    }

    return view('dasar-hukum.create');
}

public function store(Request $request)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa menambah dasar hukum.');
    }

    $request->validate([
        'title' => 'required',
        'file' => 'required|mimes:pdf|max:2048',
    ]);

    $path = $request->file('file')->store('dasar-hukum', 'public');

    DasarHukum::create([
        'title' => $request->title,
        'file' => $path,
    ]);

    return redirect()->route('dasar-hukum.index')->with('success', 'Dasar hukum berhasil ditambahkan.');
}

public function edit(DasarHukum $dasarHukum)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa mengedit dasar hukum.');
    }

    return view('dasar-hukum.edit', compact('dasarHukum'));
}

public function update(Request $request, DasarHukum $dasarHukum)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa mengupdate dasar hukum.');
    }

    $request->validate([
        'title' => 'required',
        'file' => 'nullable|mimes:pdf|max:2048',
    ]);

    $data = ['title' => $request->title];

    if ($request->hasFile('file')) {
        if (Storage::disk('public')->exists($dasarHukum->file)) {
            Storage::disk('public')->delete($dasarHukum->file);
        }

        $data['file'] = $request->file('file')->store('dasar-hukum', 'public');
    }

    $dasarHukum->update($data);

    return redirect()->route('dasar-hukum.index')->with('success', 'Dasar hukum berhasil diperbarui.');
}

public function destroy(DasarHukum $dasarHukum)
{
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak - Hanya admin yang bisa menghapus dasar hukum.');
    }

    if (Storage::disk('public')->exists($dasarHukum->file)) {
        Storage::disk('public')->delete($dasarHukum->file);
    }

    $dasarHukum->delete();

    return redirect()->back()->with('success', 'Dasar hukum berhasil dihapus.');
}
}
