<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SopPpid extends Model
{
    use HasFactory;

    protected $table = 'sop_ppids'; // Nama tabel di database
    protected $fillable = ['title', 'file'];
}
