<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupMesimorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_mesimors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emer_G_M');
            $table->unsignedInteger('ID_Departament');
            $table->foreign('ID_Departament')->references('id')->on('departaments')->onDelete('cascade');;
            $table->unsignedInteger('ID_Viti_Akademik');
            $table->foreign('ID_Viti_Akademik')->references('id')->on('viti_akademiks')->onDelete('cascade');;
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
        Schema::dropIfExists('grup__mesimors');
    }
}
