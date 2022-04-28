<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_info', function (Blueprint $table) {
            $table->Increments('ordinal_id');
            $table->bigInteger('employee_id')->unsigned();
            $table->integer('bonus_id')->unsigned();
            $table->integer('salary_id')->unsigned();
            $table->integer('isDelete')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade');
            $table->foreign('bonus_id')->references('bonus_id')->on('bonus_detail')->onDelete('cascade');
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
        Schema::dropIfExists('bonus_info');
    }
}
