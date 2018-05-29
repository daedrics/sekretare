<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakultetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakultets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ID_Universitet');
            $table->foreign('ID_Universitet')->references('id')->on('universitets')->onDelete('cascade');;
            $table->string('emer_FAKUL');
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
        Schema::dropIfExists('fakultets');
    }
}
