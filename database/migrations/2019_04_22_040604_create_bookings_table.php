<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('room_id');
            $table->timestamp('check_in');
            $table->timestamp('check_out');
            $table->double('price_per_night');
            $table->json('properties')->nullable();
            $table->integer('payment_status')->default(0)->comment('0=Unpaid, 1=Paid');
            $table->integer('status')->default(0)->comment('0=Pending, 1=Booked, 3=Cancelled');
            $table->integer('updated_by')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
