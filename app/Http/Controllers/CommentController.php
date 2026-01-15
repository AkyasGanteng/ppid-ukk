<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Berita;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Berita $berita)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'berita_id' => $berita->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
