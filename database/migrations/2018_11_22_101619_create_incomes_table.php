<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('source');
            $table->string('employer_name');
            $table->string('industry');
            $table->string('employer_address');
            $table->string('position');
            $table->integer('operation_length');
            $table->integer('monthly_income');
            $table->string('employer_tel');
            $table->string('employer_email');
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
        Schema::dropIfExists('incomes');
    }
}
