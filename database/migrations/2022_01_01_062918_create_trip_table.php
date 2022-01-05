<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->increments('tripID');
            $table->integer('vehicleID')->unsigned();
            $table->string('routeID');
            $table->integer('FreeSeats')->default(16);
            $table->time('ETD')->default('8:00');
            $table->time('ETA')->default('8:45');
            $table->enum('Status', ['OPEN', 'CLOSED', 'ARRIVED', 'DELETED'])->default('OPEN');
            $table->timestamps();
            $table->foreign('vehicleID')->references('vehicleID')->on('vhire')->cascadeondelete()->cascadeonupdate();
            $table->foreign('routeID')->references('routeID')->on('route')->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
