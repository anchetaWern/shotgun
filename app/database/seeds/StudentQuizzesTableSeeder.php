<?php
class StudentQuizzesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('student_quizzes')->delete();
        
        $class_id = 1;
        $students = DB::table('student_classes')
        	->where('class_id', '=', $class_id)
        	->get();

        $quiz_id = 5;
        $quiz_schedule_id = 1;

        foreach($students as $student){

        	DB::table('student_quizzes')
        		->insert(array(
        			'student_id' => $student->student_id,
        			'quiz_id' => $quiz_id,
        			'quiz_schedule_id' => $quiz_schedule_id,
        			'score' => mt_rand(0, 3),
        			'started_at' => Carbon::now()->toDateTimeString(),
        			'submitted_at' => Carbon::now()->modify('+ 5 minutes')->toDateTimeString()
        		));
        }
    }

}