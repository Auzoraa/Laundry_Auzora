<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->integer('id_outlet');
            $table->enum('jenis', ['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain'])->comment(implode(['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain']));
            $table->string('nama_paket', 100);
            $table->integer('harga');
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
        Schema::dropIfExists('paket');
    }
}
