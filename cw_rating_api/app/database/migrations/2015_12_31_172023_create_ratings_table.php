<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema ::create('ratings',function($newtable){
			$newtable->increments('rating_id');
			$newtable->string('seller',100);
			$newtable->string('buyer',100);
			$newtable->string('review',500);
			$newtable->unsignedInteger('rating_number')->notNull();
			$newtable->rememberToken();
			$newtable->timestamps();
		});*/
	
		
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
