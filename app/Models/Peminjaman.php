<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'email',
        'nim',
        'nomor_hp',
        'jumlah',
        'tanggal_pinjaman',
        'tanggal_pengembalian',
        'kode_pbl',
    ];

    public function goods()
    {
        return $this->belongsToMany(Goods::class, 'peminjaman_goods')->withPivot('quantity')->withTimestamps();
    }
}
