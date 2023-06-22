<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pengembalian',
        'jumlah_barang',
        'keterangan',
        // tambahkan atribut lain yang relevan
    ];

    // Definisikan relasi dengan model Peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
