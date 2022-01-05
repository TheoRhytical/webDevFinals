<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVhireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vhire', function (Blueprint $table) {
            $table->increments('vehicleID');
            $table->integer('driverID')->unsigned();
            $table->string('PlateNum');
            $table->string('Brand');
            $table->string('Model');
            $table->string('Color');
            $table->integer('Capacity')->default(16);
            $table->enum('Status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->timestamps();
            $table->foreign('driverID')->references('userID')->on('users')->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vhire');
    }
}
