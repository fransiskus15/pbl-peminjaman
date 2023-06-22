<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nim');
            $table->string('nomor_hp');
            $table->integer('jumlah');
            $table->date('tanggal_pinjaman');
            $table->date('tanggal_pengembalian');
            $table->string('kode_pbl');
            $table->unsignedBigInteger('goods_id');
            $table->timestamps();

            $table->foreign('goods_id')->references('id')->on('goods')->onDelete('cascade');
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->string('status')->default('pending');
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('status');
        }); 
    }
}
