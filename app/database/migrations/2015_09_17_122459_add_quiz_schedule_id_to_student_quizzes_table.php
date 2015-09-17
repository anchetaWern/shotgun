<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuizScheduleIdToStudentQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_quizzes', function($table){
			$table->integer('quiz_schedule_id')->after('quiz_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_quizzes', function($table){
			$table->dropColumn('quiz_schedule_id');
		});
	}

}
