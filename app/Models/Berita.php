<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = ['judul', 'foto', 'teks', 'tanggal', 'penulis'];

    // Relasi ke komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
