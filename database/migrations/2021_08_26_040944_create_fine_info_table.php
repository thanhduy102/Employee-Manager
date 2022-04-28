<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFineInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fine_info', function (Blueprint $table) {
            $table->Increments('ordinal_id');
            $table->bigInteger('employee_id')->unsigned();
            $table->integer('fine_id')->unsigned();
            $table->integer('salary_id')->unsigned();
            $table->integer('isDelete')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade');
            $table->foreign('fine_id')->references('fine_id')->on('fine_detail')->onDelete('cascade');
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
        Schema::dropIfExists('fine_info');
    }
}
