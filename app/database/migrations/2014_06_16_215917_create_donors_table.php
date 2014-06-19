<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('donors', function($table) {

		$table->increments('id');
	    $table->string('firstname', 20);
	    $table->string('lastname', 20);
	    $table->string('email', 100)->unique();
	    $table->integer('user_id');
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
		Schema::drop('donors');
	}

}
