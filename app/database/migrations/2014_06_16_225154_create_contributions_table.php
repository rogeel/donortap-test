<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('contributions', function($table) {

		$table->increments('id');
	  	$table->double('amount', 15, 2);
	    $table->integer('user_id');
	    $table->integer('candidate_id');
	    $table->dateTime('date');
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
		Schema::drop('contributions');
	}

}
