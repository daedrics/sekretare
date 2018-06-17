<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleteProvimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flete__provims', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ID_Provim');
            $table->foreign('ID_Provim')->references('id')->on('provims')->onDelete('cascade');;
            $table->unsignedInteger('ID_Student');
            $table->foreign('ID_Student')->references('id')->on('students')->onDelete('cascade');;
            $table->integer('nota')->nullable();
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
        Schema::dropIfExists('flete__provims');
    }
}
