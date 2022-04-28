<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('employee_id');
            $table->string('full_name',50)->nullable();
            $table->string('gender',10)->nullable();
            $table->integer('position_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('isDelete')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('position_id')->references('position_id')->on('position')->onDelete('cascade');
            $table->foreign('department_id')->references('department_id')->on('department')->onDelete('cascade');
            $table->foreign('level_id')->references('level_id')->on('level')->onDelete('cascade');
        });

        DB::update("ALTER TABLE employee AUTO_INCREMENT =10001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
