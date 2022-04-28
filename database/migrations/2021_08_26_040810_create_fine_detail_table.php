<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFineDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fine_detail', function (Blueprint $table) {
            $table->Increments('fine_id');
            $table->string('fine_reason',100)->nullable();
            $table->integer('fine')->unsigned()->nullable();
            $table->integer('isDelete')->unsigned()->nullable();
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
        Schema::dropIfExists('fine_detail');
    }
}
