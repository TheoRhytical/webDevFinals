<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route', function (Blueprint $table) {
            $table->string('routeID')->primary();
            $table->string('O_termID');
            $table->string('D_termID');
            $table->float('Fare')->default(100);
            $table->time('Trip Duration')->default('0:45:00');
            $table->enum('Status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
            $table->timestamps();
            $table->foreign('O_termID')->references('terminalID')->on('terminal')->cascadeondelete()->cascadeonupdate();
            $table->foreign('D_termID')->references('terminalID')->on('terminal')->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route');
    }
}
