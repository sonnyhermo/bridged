<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('business_type');
            $table->string('business_name');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('ownership_type');
            $table->date('date_establishment')->nullable();
            $table->integer('operation_year');
            $table->string('sss');
            $table->string('tin');
            $table->string('tel_no');
            $table->string('fax_no');
            $table->string('website');
            $table->string('representative');
            $table->string('representative_contact');
            $table->string('representative_tenure');
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
        Schema::dropIfExists('entities');
    }
}
