<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailDescriptionCoveraageLogoSlugInBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banks', function (Blueprint $table) {
            $table->unique('name');
            $table->string('email');
            $table->text('description');
            $table->text('coverage');
            $table->string('logo');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banks', function (Blueprint $table) {
            $table->dropUnique('banks_name_unique');
            $table->dropColumn('email');
            $table->dropColumn('description');
            $table->dropColumn('coverage');
            $table->dropColumn('logo');
            $table->dropColumn('slug');
        });
    }
}
