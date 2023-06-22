<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomBooking;

class Room extends Model
{
    // use HasFactory;
    // public function peminjamanRuangan()
    // {
    //     return $this->hasMany(RoomBooking::class, 'ruangan_id');
    // }

    protected $table = 'rooms';

    protected $fillable = ['id', 'nama_ruangan','status'];
}
