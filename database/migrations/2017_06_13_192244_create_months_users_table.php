<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users');
            $table->integer('level1')->default(0);
            $table->integer('level2')->default(0);
            $table->integer('level3')->default(0);
            $table->integer('level4')->default(0);
            $table->integer('level5')->default(0);
            $table->integer('level6')->default(0);
            $table->integer('level7')->default(0);
            $table->integer('level8')->default(0);
            $table->integer('level9')->default(0);
            $table->integer('level10')->default(0);
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
        Schema::dropIfExists('months_users');
    }
}
