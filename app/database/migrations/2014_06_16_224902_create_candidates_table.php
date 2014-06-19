<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('candidates', function($table) {

		$table->increments('id');
	    $table->string('firstname', 20);
	    $table->string('lastname', 20);
	    $table->string('email', 100)->unique();
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
		//
		Schema::drop('candidates');
	}

}
