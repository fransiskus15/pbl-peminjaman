<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
class RoomBooking extends Model
{
    // use HasFactory;

    // protected $fillable = [
    //     'email',
    //     'nama_kegiatan',
    //     'nim',
    //     'nomor_hp',
    //     'bukti_persetujuan',
    //     'kode_pbl',
    //     'ruangan_id',
    //     'tanggal_kegiatan',
    //     'jam_penggunaan',
    //     'nama_pengguna',
    //     'penanggung_jawab',
    // ];

    // public function ruangan()
    // {
    //     return $this->belongsTo(Room::class, 'ruangan');
    // }

    protected $table = 'room_bookings';

    protected $fillable = [
        'email', 
        'nama_kegiatan', 
        'nim', 
        'nomor_hp', 
        'bukti_persetujuan',  
        'kode_pbl', 
        'ruangan_id',
        'tanggal_kegiatan',
        'jam_penggunaan',
        'nama_pengguna',
        'penanggung_jawab',
        'status',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
