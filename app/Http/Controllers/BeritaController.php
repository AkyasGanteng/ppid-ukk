<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('berita.index', compact('beritas'));
    }
    
    public function create()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa menambah berita.');
        }
    
        return view('berita.create');
    }
    
    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa menambah berita.');
        }
    
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'teks' => 'required',
            'tanggal' => 'required|date',
            'penulis' => 'required',
        ]);
    
        $fotoPath = $request->file('foto')->store('foto-berita', 'public');
    
        Berita::create([
            'judul' => $request->judul,
            'foto' => $fotoPath,
            'teks' => $request->teks,
            'tanggal' => Carbon::parse($request->tanggal)->timezone('Asia/Jakarta'),
            'penulis' => $request->penulis,
        ]);
    
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }
    
    public function edit(Berita $berita)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak - Hanya admin yang bisa mengedit berita.');
        }
    
        return view('berita.edit', compact('berita'));
    }
    

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'teks' => 'required',
            'tanggal' => 'required|date',
            'penulis' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            $berita->foto = $request->file('foto')->store('foto-berita', 'public');
        }

        $berita->judul = $request->judul;
        $berita->teks = $request->teks;
        $berita->tanggal = Carbon::parse($request->tanggal)->timezone('Asia/Jakarta');
        $berita->penulis = $request->penulis;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function show($id)
    {
        // Load berita dengan komentar & user agar efisien
        $berita = Berita::with(['comments.user'])->findOrFail($id);

        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaLainnya'));
    }

    /**
     * Menampilkan halaman beranda (welcome) dengan berita dan galeri terbaru.
     */
    public function beranda()
    {
        $berita_terkini = Berita::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(4)->get();

        return view('welcome', compact('berita_terkini', 'galeris'));
    }
}
