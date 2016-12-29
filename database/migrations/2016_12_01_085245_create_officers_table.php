<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('post');
            $table->string('office_address');
            $table->string('district');
            $table->string('pin');
            $table->tinyInteger('status');
            $table->integer('taluka_id')->unsigned();
            $table->foreign('taluka_id')
                ->references('id')->on('talukas')
                ->onDelete('cascade');
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
        Schema::drop('officers');
    }
}
