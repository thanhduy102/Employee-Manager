<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->bigIncrements('contract_id');
            $table->bigInteger('employee_id')->unsigned();
            $table->string('type_contract',70)->nullable();
            $table->date('sign_day');
            $table->date('expiration_day');
            $table->integer('isDelete')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade');
        });

        DB::update("ALTER TABLE contract AUTO_INCREMENT=10001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
}
