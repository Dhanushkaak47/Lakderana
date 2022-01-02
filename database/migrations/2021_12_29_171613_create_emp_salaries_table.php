<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->double('basic_salary');
            $table->double('travel_allowence');
            $table->double('over_time');
            $table->double('weekend_bonus');
            $table->double('other_bonus');
            $table->double('nopay_leave');
            $table->double('epf');
            $table->boolean('pay_status')->default('0');
            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_salaries');
    }
}
