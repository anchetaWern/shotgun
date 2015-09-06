<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quiz_schedules', function($table){
			$table->increments('id');
			$table->integer('quiz_id');
			$table->integer('class_id');
			$table->timestamp('datetime_from');
			$table->timestamp('datetime_to');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quiz_schedules');
	}

}
