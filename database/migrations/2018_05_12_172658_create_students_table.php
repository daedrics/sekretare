<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emer');
            $table->string('mbiemer');
            $table->date('ditelindje');
            $table->date('data_regjistrim');
            $table->unsignedInteger('ID_Grup_Mesimor');
            $table->foreign('ID_Grup_Mesimor')->references('id')->on('grup_mesimors')->onDelete('cascade');;
            $table->unsignedInteger('ID_User');
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('cascade');;
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
        Schema::dropIfExists('students');
    }
}
