<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'email',
        'nim',
        'nomor_hp',
        'jumlah',
        'tanggal_pinjaman',
        'tanggal_pengembalian',
        'kode_pbl',
        'goods_id',
        'status',
    ];

    // ...
}
