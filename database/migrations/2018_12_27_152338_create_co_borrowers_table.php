<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_borrowers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->boolean('gender');
            $table->string('nationality');
            $table->date('birth_date');
            $table->text('residence_address');
            $table->string('employer');
            $table->string('industry');
            $table->text('employer_address');
            $table->string('position');
            $table->integer('tenure');
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
        Schema::dropIfExists('co_borrowers');
    }
}
