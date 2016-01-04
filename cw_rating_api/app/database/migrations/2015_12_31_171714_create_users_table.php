<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema ::create('users',function($newtable){
			$newtable->increments('id');
			$newtable->string('username',15)->unique();
			$newtable->string('email',100)->unique();
			$newtable->string('password',100)->unique();
			$newtable->rememberToken();
			$newtable->timestamps();
		});

		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
