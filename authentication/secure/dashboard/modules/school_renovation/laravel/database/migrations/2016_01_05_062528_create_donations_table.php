<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('donation_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('school_id');
            $table->integer('amount');
            $table->foreign('user_id')->references('user_id')->on('mm_users');
            $table->foreign('school_id')->references('school_id')->on('schools');
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
        Schema::drop('donations');
    }
}
