<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTables extends Migration
{
    // Both Admin and User tables
    protected $tables = ['admins', 'users'];

    /**
     * Add the ability to run certain functions
     * on multiple tables
     */
    protected function eachTable(Closure $action)
    {
        foreach ($this->tables as $table) {
            $action($table);
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


           Schema::create("admins", function (Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('name');
            $blueprint->string('email')->unique();
            $blueprint->string('password', 60);
            $blueprint->rememberToken();
            $blueprint->timestamps();
        });

        Schema::create("users", function (Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('name');
            $blueprint->string('email')->unique();
            $blueprint->string('password');
            $blueprint->string('usertype');
            $blueprint->string('mobile');
            $blueprint->string('address');
            $blueprint->string('designation');
            $blueprint->string('city');
            $blueprint->string('state');
            $blueprint->string('pin');
            $blueprint->tinyInteger('status');
            $blueprint->rememberToken();
            $blueprint->timestamps();
        });


//        $this->eachTable(function ($table) {
//            Schema::create($table, function (Blueprint $blueprint) {
//                $blueprint->increments('id');
//                $blueprint->string('name');
//                $blueprint->string('email')->unique();
//                $blueprint->string('password', 60);
//                $blueprint->rememberToken();
//                $blueprint->timestamps();
//            });
//        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->eachTable(function ($table) {
            Schema::drop($table);
        });
    }
}
