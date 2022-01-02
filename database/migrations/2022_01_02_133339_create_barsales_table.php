<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barsales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cus_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('qty');
            $table->boolean('unit_price');
            $table->boolean('line_total');
            $table->timestamps();

            $table->foreign('cus_id')->references('id')->on('customer_data');
            $table->foreign('item_id')->references('id')->on('baritems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barsales');
    }
}
