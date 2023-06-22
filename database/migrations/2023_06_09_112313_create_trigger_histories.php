<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_histories AFTER INSERT ON loans
            FOR EACH ROW
            BEGIN
                INSERT INTO histories (email, nim, nomor_hp, tanggal_pinjaman, tanggal_pengembalian, kode_pbl, status, goods_id, created_at, updated_at)
                VALUES (NEW.email, NEW.nim, NEW.nomor_hp, NEW.tanggal_pinjaman, NEW.tanggal_pengembalian, NEW.kode_pbl, NEW.status, NEW.goods_id, NOW(), NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_histories');
    }
}
