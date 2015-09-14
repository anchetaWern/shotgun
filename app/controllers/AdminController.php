<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.admin';


	public function dashboard(){
		$this->layout->content = View::make('admin.dashboard');
	}


	public function newQuiz(){
		$page_data = array(
			'type' => 'new'
		);
		$this->layout->content = View::make('admin.new_quiz', $page_data);
	}


	public function createQuiz(){

		$user_id = Auth::user()->id;

		$title = Input::get('title');
		$questions = Input::get('question');
		$answers = Input::get('answer');
		$choices = Input::get('choice');
		
		$quiz = new Quiz;
		$quiz->user_id = $user_id;
		$quiz->title = $title;
		$quiz->save();

		$quiz_id = $quiz->id;
		
		if(!empty($questions['new'])){
			$new_questions = $questions['new'];
			$new_answers = $answers['new'];
			$new_choices = $choices['new'];

			foreach($new_questions as $index => $question){

				$quiz_item = new QuizItem;
				$quiz_item->quiz_id = $quiz_id;
				$quiz_item->question = $question;
				$quiz_item->save();
				$quiz_item_id = $quiz_item->id;
				
				if(!empty($new_answers[$index])){
					$item_answers = $new_answers[$index];
					foreach($item_answers as $answer){
						
						$quiz_item_answer = new QuizItemAnswer;
						$quiz_item_answer->quiz_item_id = $quiz_item_id; 
						$quiz_item_answer->answer = $answer;
						$quiz_item_answer->save();

					}
				}
				

				if(!empty($new_choices[$index])){			
					$item_choices = $new_choices[$index];
					foreach($item_choices as $choice){
						
						$quiz_item_choice = new QuizItemChoice;
						$quiz_item_choice->quiz_item_id = $quiz_item_id;
						$quiz_item_choice->choice = $choice;
						$quiz_item_choice->save();
					}
				}

			}
		}
		

		return Redirect::back()->with('message', array('type' => 'success', 'text' => 'Quiz Created!'));

	}


	public function quizzes(){

		$user_id = Auth::user()->id;
		$quizzes = Quiz::where('user_id', '=', $user_id)->get();
		$this->layout->title = 'Quizzes';
		$this->layout->content = View::make('admin.quizzes', array('quizzes' => $quizzes));
	}


	public function quiz($id){

		$user_id = Auth::user()->id;

		$quiz = Quiz::where('id', '=', $id)
			->where('user_id', '=', $user_id)
			->first();

		$items = QuizItem::where('quiz_id', '=', $id)->get();

		$item_ids = DB::table('quiz_items')->where('quiz_id', '=', $id)->lists('id');

		$quiz_items_answers = DB::table('quiz_items_answers')->whereIn('quiz_item_id', $item_ids)->get();

		$quiz_items_choices = DB::table('quiz_items_choices')->whereIn('quiz_item_id', $item_ids)->get();

		$quiz_items = array();

		foreach($items as $item){
			$quiz_items[$item->id] = array(
				'question' => $item->question
			);
		}

		foreach($quiz_items_answers as $qia){
			$quiz_items[$qia->quiz_item_id]['answers'][] = $qia->answer; 
		}

		foreach($quiz_items_choices as $qic){
			$quiz_items[$qic->quiz_item_id]['choices'][] = $qic->choice;
		}
		
		$page_data = array(
			'type' => 'old',
			'quiz' => $quiz,
			'quiz_items' => $quiz_items
		);

		$this->layout->title = $quiz->title;
		$this->layout->content = View::make('admin.quiz', $page_data);
		

	}


	public function updateQuiz($quiz_id){

		$quiz = Quiz::find($quiz_id);
		$quiz->title = Input::get('title');
		$quiz->save();

		$questions = Input::get('question');
		$answers = Input::get('answer');
		$choices = Input::get('choice');

		if(!empty($questions['old'])){
			$old_questions = $questions['old'];

			$old_answers = $answers['old'];

			$quiz_items = DB::table('quiz_items')
				->where('quiz_id', '=', $quiz_id)
				->get();
			

			foreach($quiz_items as $question_index => $quiz_item){
				
				$quiz_item_id = $quiz_item->id;
				
				$quiz_item = QuizItem::find($quiz_item_id);
				$quiz_item->quiz_id = $quiz_id;
				$quiz_item->question = $old_questions[$question_index];
				$quiz_item->save();
				
				$current_number_of_answers = 0;
				
				if(!empty($old_answers[$quiz_item_id])){

					$quiz_items_answers = DB::table('quiz_items_answers')
						->where('quiz_item_id', '=', $quiz_item_id)
						->get();

					$item_answers = $old_answers[$quiz_item_id];
					
					$total_answers = count($item_answers) - 1;
					
					foreach($quiz_items_answers as $qia_index => $qia){
						
						$answer = QuizItemAnswer::find($qia->id);
						$answer->answer = $item_answers[$qia_index];
						$answer->save();
						$current_number_of_answers += 1;
					}

					
					$answer_index = $current_number_of_answers;
					for($x = $answer_index; $x <= $total_answers; $x++){
						
						$quiz_item_answer = new QuizItemAnswer;
						$quiz_item_answer->quiz_item_id = $quiz_item_id; 
						$quiz_item_answer->answer = $item_answers[$x];
						$quiz_item_answer->save();
						
					}
					

				}
				
				if(!empty($choices['old'])){

					$item_choices = array();

					$old_choices = $choices['old'];
					$total_choices = count($old_choices);
					$current_number_of_choices = 0;

					$quiz_items_choices = DB::table('quiz_items_choices')
							->where('quiz_item_id', '=', $quiz_item_id)
							->get();

					$current_number_of_choices = count($quiz_items_choices);

					if(!empty($old_choices[$quiz_item_id])){

						$item_choices = $old_choices[$quiz_item_id];

						foreach($quiz_items_choices as $qic_index => $qic){
							
							$choice = QuizItemChoice::find($qic->id);
							$choice->choice = $item_choices[$qic_index];
							$choice->save();
							
						}
						
					}

					if(!empty($item_choices)){
						
						while($current_number_of_choices < $total_choices){
							
							if(!empty($item_choices[$current_number_of_choices])){

								$choice = $item_choices[$current_number_of_choices];
								
								$quiz_item_choice = new QuizItemChoice;
								$quiz_item_choice->quiz_item_id = $quiz_item_id;
								$quiz_item_choice->choice = $choice;
								$quiz_item_choice->save();
								

							}
							$current_number_of_choices += 1;
						}
					}
				}
			
			}

		}

		if(!empty($questions['new'])){
			$new_questions = $questions['new'];
			$new_answers = $answers['new'];
			
			foreach($new_questions as $index => $question){

				$quiz_item = new QuizItem;
				$quiz_item->quiz_id = $quiz_id;
				$quiz_item->question = $question;
				$quiz_item->save();
				$quiz_item_id = $quiz_item->id;
				
				if(!empty($new_answers[$index])){
					$item_answers = $new_answers[$index];
					foreach($item_answers as $answer){
						
						$quiz_item_answer = new QuizItemAnswer;
						$quiz_item_answer->quiz_item_id = $quiz_item_id; 
						$quiz_item_answer->answer = $answer;
						$quiz_item_answer->save();

					}
				}
				
				
				if(!empty($choices['new'][$index])){

					$new_choices = $choices['new'];

					$item_choices = $new_choices[$index];
					foreach($item_choices as $choice){
						
						$quiz_item_choice = new QuizItemChoice;
						$quiz_item_choice->quiz_item_id = $quiz_item_id;
						$quiz_item_choice->choice = $choice;
						$quiz_item_choice->save();
					}
				}

			}
		}
		
		
		return Redirect::back()->with('message', array('type' => 'success', 'text' => 'Quiz Updated!'));

	}


	public function newClass(){

		$this->layout->title = 'Create New Class';
		$this->layout->content = View::make('admin.new_class');

	}


	public function createClass(){

		$name = Input::get('name');
		$details = Input::get('details');

		$students = Input::get('students');
		$students = explode("\n", $students);
		
		$class_id = DB::table('classes')->insertGetId(array(
			'name' => $name,
			'details' => $details,
			'class_code' => str_random(10)
		));
		
		foreach($students as $row){
			if(!empty($row)){

				$exploded_row = explode("\t", $row);
				
				$student_id = trim($exploded_row[0]);
				$student_name = trim($exploded_row[1]);

				$name_length = strlen($student_name);
				$delimiter_position = strpos($student_name, ',');

				$last_name = substr($student_name, 0, $delimiter_position);
				$middle_initial = substr($student_name, -2);
				$first_name = trim(substr($student_name, $delimiter_position + 1, -3)); 

				$student = Student::find($student_id);
				if(!$student){
					$student = new Student;
					$student->id = $student_id;
					$student->last_name = $last_name;
					$student->first_name = $first_name;
					$student->middle_initial = $middle_initial;
					$student->save();
				}

				$student_class_id = $class_id . $student_id;
				$student_class = StudentClass::find($student_class_id);
				if(!$student_class){
					$student_class = new StudentClass;
					$student_class->id = $student_class_id;
					$student_class->student_id = $student_id;
					$student_class->class_id = $class_id;
					$student_class->save();
				}
				
			}
		}
		
		return Redirect::back()->with('message', array('type' => 'success', 'text' => 'Class Created!'));

	}

}