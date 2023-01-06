<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function buku() {
        return $this->belongsTo(Buku::class);
    }
}
