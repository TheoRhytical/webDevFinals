<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminal', function (Blueprint $table) {
            $table->string('terminalID')->primary();
            $table->integer('adminID')->unsigned();
            $table->string('Location_Name');
            $table->string('City');
            $table->timestamps();
            $table->foreign('adminID')->references('userID')->on('users')->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminal');
    }
}
