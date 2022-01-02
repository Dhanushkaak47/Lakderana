<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_data', function (Blueprint $table) {
            $table->id();
            $table->string('cus_id')->unique(); 
            $table->string('cus_full_name');
            $table->integer('mobile')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('nic')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
          

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_data');
    }
}
