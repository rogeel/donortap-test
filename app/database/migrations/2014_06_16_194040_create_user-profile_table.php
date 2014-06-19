<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user-profile', function($table) {

		$table->increments('id');
		$table->integer('user-id');
	    $table->integer('occupation-id');
	    $table->integer('location-id');
	    $table->string('politicalParty-id');
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
		Schema::drop('user-profile');
	}

}
