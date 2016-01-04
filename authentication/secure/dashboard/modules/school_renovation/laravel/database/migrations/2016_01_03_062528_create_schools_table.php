<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('schools', function (Blueprint $table) {
            $table->increments('school_id');
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->integer('amount_required');
            $table->integer('amount_gathered');
            $table->unsignedInteger('image_id');
            $table->text('address');
            $table->text('description');
            $table->foreign('user_id')->references('user_id')->on('mm_users');
            $table->foreign('image_id')->references('image_id')->on('images');
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
        Schema::drop('schools');
    }
}
