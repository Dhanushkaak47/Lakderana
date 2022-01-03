<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('roomNo');
            $table->unsignedBigInteger('roomtype');
            $table->unsignedBigInteger('hotelID');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('roomtype')->references('id')->on('roomtypes');
            $table->foreign('hotelID')->references('id')->on('hotel_chains');
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
