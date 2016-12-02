<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_adunit')->unsigned();
            $table->foreign('fk_adunit')
                   ->references('id')
                   ->on('ad_units');
            $table->integer('fk_user')->unsigned();
            $table->foreign('fk_user')
                  ->references('id')
                  ->on('users');
            $table->string('share');
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
        Schema::drop('projects');
    }
}
