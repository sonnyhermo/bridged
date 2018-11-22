<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->boolean('gender');
            $table->string('nationality');
            $table->string('civil_status');
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('mother_maiden');
            $table->string('present_street');
            $table->string('present_city');
            $table->string('present_province');
            $table->integer('present_stay_length');
            $table->string('present_ownership');
            $table->string('permanent_street');
            $table->string('permanent_city');
            $table->string('permanent_province');
            $table->integer('permanent_stay_length');
            $table->string('permanent_ownership');
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
        Schema::dropIfExists('borrowers');
    }
}
