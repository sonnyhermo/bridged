<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('gender');
            $table->string('nationality');
            $table->string('civil_status');
            $table->date('birthdate');
            $table->string('birth_place');
            $table->string('mother_maiden_name')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->integer('lenght_stay')->nullable();
            $table->string('residence_ownership');
            $table->string('permanent_address');
            $table->string('tel_no')->nullable();
            $table->string('mobile_no');
            $table->string('sss_gsis_id')->nullable();
            $table->string('tin_no')->nullable();
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
        Schema::dropIfExists('individuals');
    }
}
