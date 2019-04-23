<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->comment('e.i PRIVATE ROOM IN APARTMENT');
            $table->integer('hotel_id');
            $table->integer('adult_capacity')->nullable();
            $table->integer('child_capacity')->nullable();
            $table->double('price_per_night');
            $table->integer('is_active')->default(1)->comment('0=Inactive, 1=Active');
            $table->string('apartment_description')->nullable()->comment('e.i 2 bedroom; 3 bed; 1 bath');
            $table->string('check_in_process')->nullable()->comment('e.i Self check in at any time');
            $table->text('description')->nullable()->comment('e.i One newly furnished private room with its own balcony and shared kitchen ....');
            $table->json('other_info')->nullable();

            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_number')->nullable();

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
        Schema::dropIfExists('rooms');
    }
}
