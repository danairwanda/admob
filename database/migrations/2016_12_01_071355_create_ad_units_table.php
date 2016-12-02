<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adUnit_id');
            $table->string('name');
            $table->integer('fk_app')->unsigned();
            $table->foreign('fk_app')->references('id')->on('applications');
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
        Schema::drop('ad_units');
    }
}
