<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProblemIdColToDonateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('donate', function(Blueprint $table)
		{
			$table->unsignedInteger('problemId')->default(2);
		});

		Schema::table('donate', function(Blueprint $table){
			$table->foreign('problemId')->references('id')->on('problems');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('donate', function(Blueprint $table)
		{
			//
		});
	}

}
