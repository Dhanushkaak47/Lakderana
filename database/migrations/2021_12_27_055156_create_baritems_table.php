<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baritems', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->double('costPrice');
            $table->integer('qty');
            $table->double('total');
            $table->double('sellprice');
            $table->biginteger('category');
            $table->string('description');
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
        Schema::dropIfExists('baritems');
    }
}
