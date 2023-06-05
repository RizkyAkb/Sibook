<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_main');
            $table->integer('sesi_mulai');
            $table->integer('sesi_selesai');
            $table->integer('id_pemesan');
            $table->string('nama_pemesan');
            $table->integer('nohp');
            $table->string('status');
            $table->integer('id_lapangan');
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
        Schema::dropIfExists('bookings');
    }
}
