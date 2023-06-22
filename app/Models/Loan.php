<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loans';

    protected $fillable = [
        'email', 'nim', 'nomor_hp', 'jumlah', 'tanggal_pinjaman', 'tanggal_pengembalian', 'kode_pbl', 'goods_id','status',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }

    public function mahasiswa()
{
    return $this->belongsTo(User::class, 'nim', 'nim');
}
}
