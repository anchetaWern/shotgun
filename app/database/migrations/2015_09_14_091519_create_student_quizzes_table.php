<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_quizzes', function($table){
			$table->increments('id');
			$table->integer('student_id');
			$table->integer('quiz_id');
			$table->timestamp('started_at');
			$table->timestamp('submitted_at');
			$table->integer('score');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_quizzes');
	}

}
