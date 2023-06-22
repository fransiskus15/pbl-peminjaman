<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama_kegiatan');
            $table->string('nim');
            $table->string('nomor_hp');
            $table->string('bukti_persetujuan');
            $table->string('kode_pbl');
            $table->unsignedBigInteger('ruangan_id');
            $table->foreign('ruangan_id')->references('id')->on('rooms');
            $table->date('tanggal_kegiatan');
            $table->string('jam_penggunaan');
            $table->string('nama_pengguna');
            $table->string('penanggung_jawab');
            $table->timestamps();
        });
        
        Schema::table('room_bookings', function (Blueprint $table) {
            $table->string('status')->default('tersedia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
