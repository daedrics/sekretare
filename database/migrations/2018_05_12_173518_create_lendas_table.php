<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emer');
            $table->integer('numer_leksione');
            $table->integer('numer_seminar');
            $table->integer('numer_lab');
            $table->string('detyre_kursi');
            $table->integer('kredite');
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
        Schema::dropIfExists('lendas');
    }
}
