<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_day', function (Blueprint $table) {
            $table->Increments('ordinal_id');
            $table->bigInteger('employee_id')->unsigned();
            $table->integer('salary_id')->unsigned();
            $table->integer('day_worked')->unsigned();
            $table->integer('overtime')->unsigned();
            $table->integer('isDelete')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade');
            $table->foreign('salary_id')->references('salary_id')->on('salary_month')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_day');
    }
}
