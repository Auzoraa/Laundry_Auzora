<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_outlet');
            $table->string('kode_invoice', 100);
            $table->integer('id_member');
            $table->date('tgl');
            $table->date('batas_waktu');
            $table->date('tgl_bayar');
            $table->integer('biaya_tambahan');
            $table->double('diskon');
            $table->integer('pajak');
            $table->integer('total');
            $table->enum('status', ['baru', 'proses', 'selesai', 'diambil'])->comment(implode(['baru', 'proses', 'selesai', 'diambil']));
            $table->enum('dibayar', ['dibayar', 'belum_dibayar'])->comment(implode(['dibayar', 'belum_dibayar']));
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
