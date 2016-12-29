<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('technical_sanction_date');
            $table->double('technical_sanction_approval_number');
            $table->integer('officer_id')->unsigned();
            $table->foreign('officer_id')
                ->references('id')->on('officers')
                ->onDelete('cascade');
            $table->integer('administrator_id')->unsigned();
            $table->foreign('administrator_id')
                ->references('id')->on('administrators')
                ->onDelete('cascade');
            $table->date('administrator_approval_date');
            $table->double('administrator_approval_number');
            $table->integer('final_officer_id')->unsigned();
            $table->foreign('final_officer_id')
                ->references('id')->on('final_officers')
                ->onDelete('cascade');
            $table->date('final_officer_approval_date');
            $table->double('final_officer_approval_number');
            $table->dateTime('estimated_compilation_date');
            $table->double('estimated_cost');
            $table->string('scheme_for');
            $table->text('dpc_work_remarks');
            $table->tinyInteger('release_type');
            $table->tinyInteger('work_status_dpc');
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('work_type_id')->unsigned();
            $table->foreign('work_type_id')
                ->references('id')->on('worktypes')
                ->onDelete('cascade');
            $table->integer('financial_year_id')->unsigned();
            $table->foreign('financial_year_id')
                ->references('id')->on('financial_years')
                ->onDelete('cascade');
            $table->integer('plane_id')->unsigned();
            $table->foreign('plane_id')
                ->references('id')->on('planes')
                ->onDelete('cascade');
            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')
                ->references('id')->on('sectors')
                ->onDelete('cascade');
            $table->integer('sub_sector_id')->unsigned();
            $table->foreign('sub_sector_id')
                ->references('id')->on('subsectors')
                ->onDelete('cascade');
            $table->integer('scheme_id')->unsigned();
            $table->foreign('scheme_id')
                ->references('id')->on('schemes')
                ->onDelete('cascade');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')
                ->references('id')->on('districts')
                ->onDelete('cascade');
            $table->integer('taluka_id')->unsigned();
            $table->foreign('taluka_id')
                ->references('id')->on('talukas')
                ->onDelete('cascade');
            $table->integer('village_id')->unsigned();
            $table->foreign('village_id')
                ->references('id')->on('villages')
                ->onDelete('cascade');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->date('tender_start_date');
            $table->date('tender_end_date');
            $table->date('tender_call_date');
            $table->date('tender_open_date');
            $table->date('tender_selected_date');
            $table->date('work_order_date');
            $table->double('tender_value');
            $table->text('agency_work_remarks');
            $table->tinyInteger('work_status_agency');
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
        Schema::drop('works');
    }
}
