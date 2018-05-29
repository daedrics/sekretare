<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sezoni');
            $table->date('data_provim');
            $table->unsignedInteger('ID_Lenda');
            $table->foreign('ID_Lenda')->references('id')->on('lendas')->onDelete('cascade');;
            $table->unsignedInteger('ID_Kryetar');
            $table->foreign('ID_Kryetar')->references('id')->on('pedagogs')->onDelete('cascade');;
            $table->unsignedInteger('ID_Anetar_I');
            $table->foreign('ID_Anetar_I')->references('id')->on('pedagogs')->onDelete('cascade');;
            $table->unsignedInteger('ID_Anetar_II');
            $table->foreign('ID_Anetar_II')->references('id')->on('pedagogs')->onDelete('cascade');;
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
        Schema::dropIfExists('provims');
    }
}
