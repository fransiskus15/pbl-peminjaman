<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nim');
            $table->string('nomor_hp');
            $table->integer('jumlah')->default(0);
            $table->date('tanggal_pinjaman');
            $table->date('tanggal_pengembalian');
            $table->string('kode_pbl');
            $table->unsignedBigInteger('goods_id');
            $table->string('status');
            $table->timestamps();

            $table->foreign('goods_id')->references('id')->on('goods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
