<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_detail', function (Blueprint $table) {
            $table->Increments('bonus_id');
            $table->string('bonus_reason',100)->nullable();
            $table->integer('bonus')->unsigned()->nullable();
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
        Schema::dropIfExists('bonus_detail');
    }
}
