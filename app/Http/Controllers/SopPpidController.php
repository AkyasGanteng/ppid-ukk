<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SopPpid;

class SopPpidController extends Controller
{
    public function index()
    {
        $data = SopPpid::all();
        return view('sop-ppid.index', compact('data'));
    }

    public function create()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa menambah SOP.');
        }
        return view('sop-ppid.create');
    }
    
    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa menambah SOP.');
        }
    
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
    
        $path = $request->file('file')->store('sop-ppid', 'public');
    
        SopPpid::create([
            'title' => $request->title,
            'file' => $path,
        ]);
    
        return redirect()->route('sop-ppid.index')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa mengedit SOP.');
        }
    
        $item = SopPpid::findOrFail($id);
        return view('sop-ppid.edit', compact('item'));
    }
    
    public function update(Request $request, $id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa mengupdate SOP.');
        }
    
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);
    
        $item = SopPpid::findOrFail($id);
        $data = ['title' => $request->title];
    
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('sop-ppid', 'public');
        }
    
        $item->update($data);
    
        return redirect()->route('sop-ppid.index')->with('success', 'Data berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa menghapus SOP.');
        }
    
        $item = SopPpid::findOrFail($id);
        $item->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}    
