<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orderID');
            $table->integer('customerID')->unsigned();
            $table->integer('tripID')->unsigned();
            $table->integer('Quantity')->default(1);
            $table->date('Date')->default(DB::raw('CURRENT_DATE'));
            $table->integer('AmountDue')->default(100);
            $table->enum('Status', ['UNCONFIRMED', 'CONFIRMED', 'CANCELLED'])->default('UNCONFIRMED');
            $table->timestamp('orderCreationDT')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('statusChangeDT')->default(DB::raw('CURRENT_TIMESTAMP'))->attribute();
            $table->foreign('customerID')->references('userID')->on('users')->cascadeondelete()->cascadeonupdate();
            $table->foreign('tripID')->references('tripID')->on('trip')->cascadeondelete()->cascadeonupdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
