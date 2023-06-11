<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesiListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesi_lists', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sesi');
            $table->timestamps();
        });

                        // Insert into sesi_lists ('id','nama_sesi') VALUES (1 ,'09:00'),
						// (2 ,'10:00'),
						// (3 ,'11:00'),
						// (4 ,'12:00'),
						// (5 ,'13:00'),
						// (6 ,'14:00'),
						// (7 ,'15:00'),
						// (8 ,'16:00'),
						// (9 ,'17:00'),
						// (10 ,'18:00'),
						// (11 ,'19:00'),
						// (12 ,'20:00'),
						// (13 ,'21:00'),
						// (14 ,'22:00'),
						// (15 ,'23:00')						
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesi_lists');
    }
}
