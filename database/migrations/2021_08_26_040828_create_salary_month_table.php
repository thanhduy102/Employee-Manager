<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryMonthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_month', function (Blueprint $table) {
            $table->Increments('salary_id');
            $table->integer('salary_month')->unsigned();
            $table->integer('year_id')->unsigned();
            $table->integer('isDelete')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('year_id')->references('year_id')->on('salary_year')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_month');
    }
}
