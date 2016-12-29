<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('entry_date');
            $table->double('release_fund');
            $table->text('remarks');
            $table->integer('created_by');
            $table->string('bill');
            $table->double('spent');
            $table->string('release_type');
            $table->string('work_photo');
            $table->string('measurement_book');
            $table->double('progress_percent');
            $table->tinyInteger('progress_status');
            $table->integer('work_id')->unsigned();
            $table->foreign('work_id')
                ->references('id')->on('works')
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
        Schema::drop('work_progresses');
    }
}
