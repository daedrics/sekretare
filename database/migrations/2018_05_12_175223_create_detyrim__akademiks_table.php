<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetyrimAkademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detyrim__akademiks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ID_Pedagog');
            $table->foreign('ID_Pedagog')->references('id')->on('pedagogs')->onDelete('cascade');;
            $table->unsignedInteger('ID_Student');
            $table->foreign('ID_Student')->references('id')->on('students')->onDelete('cascade');;
            $table->unsignedInteger('ID_Lenda');
            $table->foreign('ID_Lenda')->references('id')->on('lendas')->onDelete('cascade');;
            $table->boolean('ploteson');
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
        Schema::dropIfExists('detyrim__akademiks');
    }
}
