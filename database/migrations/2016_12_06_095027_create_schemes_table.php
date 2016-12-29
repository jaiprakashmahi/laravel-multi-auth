<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schemes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->integer('created_by');
            $table->double('actual_cost');
            $table->integer('sub_sector_id')->unsigned();
            $table->foreign('sub_sector_id')
                ->references('id')->on('subsectors')
                ->onDelete('cascade');
            $table->tinyInteger('status');
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
        Schema::drop('schemes');
    }
}
