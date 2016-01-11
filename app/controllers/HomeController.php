<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.default';


	public function index(){

		$this->layout->title = 'Login';
		$this->layout->content = View::make('login');
	}


	public function login(){
		$this->layout->title = 'Login';
		$this->layout->content = View::make('login');
	}


	public function doLogin(){

		$email = Input::get('email');
		$password = Input::get('password');

		if(Auth::attempt(array('email' => $email, 'password' => $password))){
		    return Redirect::intended('dashboard');
		}

		return Redirect::to('/login')
			->with('message', array('type' => 'danger', 'text' => 'Incorrect login credentials.'));
	}


	public function startQuiz(){

		$this->layout->title = 'Take Quiz';
		$this->layout->take_quiz = true;
		$this->layout->content = View::make('take_quiz');
	}


	public function doStartQuiz(){

		$id_number = Input::get('id_number');
		$quiz_code = Input::get('quiz_code');

		Session::put('id_number', $id_number);
		Session::put('quiz_code', $quiz_code);

		return Redirect::to("/take-quiz/{$quiz_code}");
	}


	public function takeQuiz(){

		//check if quiz can be taken by student, 
		//based on the time and the ID number

		$page_title = 'Cannot Take Quiz';
		$page_content = View::make('no_quiz');

		$id_number = Session::get('id_number');
		$quiz_code = Session::get('quiz_code');

		$current_datetime = Carbon::now()->toDateTimeString();

		$quiz_schedule = QuizSchedule::where('quiz_code', '=', $quiz_code)
			->whereRaw(DB::raw("'$current_datetime' BETWEEN datetime_from AND datetime_to"))
			->first();

		if($quiz_schedule){

			$quiz_schedule_id = $quiz_schedule->id;
			$class_id = $quiz_schedule->class_id;
			$quiz_id = $quiz_schedule->quiz_id;

			$student = StudentClass::where('student_id', '=', $id_number)
				->where('class_id', '=', $class_id)
				->first();

			if($student){

				//when a student takes a quiz, a row is created on the 
				//student_quizzes table, add the started_at, quiz_id, and student_id
				//when another student comes along and inputs the same id number
				//and quiz code, they won't be allowed since the quiz is already taken

				$student_quiz_count = StudentQuiz::where('student_id', '=', $id_number)
					->where('quiz_id', '=', $quiz_id)
					->count();

				if($student_quiz_count === 0){
					//can take
					//get quiz details and show it to the student

					$quiz = Quiz::where('id', '=', $quiz_id)->first();

					Session::put('quiz_id', $quiz_id);
					Session::put('quiz_title', $quiz->title);

					$items = QuizItem::where('quiz_id', '=', $quiz_id)
						->orderByRaw("RAND()")
						->get();

					$item_ids = DB::table('quiz_items')->where('quiz_id', '=', $quiz_id)->lists('id');

					$quiz_items_answers = DB::table('quiz_items_answers')->whereIn('quiz_item_id', $item_ids)->get();

					$quiz_items_choices = DB::table('quiz_items_choices')->whereIn('quiz_item_id', $item_ids)->get();

					$quiz_items = array();

					foreach($items as $item){
						$quiz_items[$item->id] = array(
							'question' => $item->question
						);
					}

					foreach($quiz_items_choices as $qic){
						$quiz_items[$qic->quiz_item_id]['choices'][] = $qic->choice;
					}

					$seconds = $quiz->minutes * 60 + 1;

					$page_data = array(
						'quiz' => $quiz,
						'quiz_items' => $quiz_items,
						'seconds' => $seconds
					);

					//create student quiz
					$student_quiz = new StudentQuiz;
					$student_quiz->student_id = $id_number;
					$student_quiz->quiz_id = $quiz_id;
					$student_quiz->quiz_schedule_id = $quiz_schedule_id;
					$student_quiz->started_at = Carbon::now()->toDateTimeString();
					$student_quiz->save();

					$page_title = 'Take Quiz';
					$page_content = View::make('quiz', $page_data);
				}

			}	
		}

		$this->layout->title = $page_title;
		$this->layout->quiz = true;
		$this->layout->content = $page_content;
	}


	public function submitQuiz(){

		if(Session::has('quiz_id')){

			$id_number = Session::get('id_number');
			$quiz_code = Session::get('quiz_code');
			$quiz_id = Session::get('quiz_id');

			$items = Input::get('item_id');
			$answers = Input::get('answer');

			$quiz_title = Session::get('quiz_title');

			$score = 0; //initial score
			$total_items = 0;

			foreach($items as $index => $item_id){

				$answer = $answers[$index];

				//select answers from database
				//search array of answers for the student's answer
				//if its in there then add 1 to score

				$db_answers = DB::table('quiz_items_answers')
					->where('quiz_item_id', '=', $item_id)
					->lists('answer');

				$answer_index = array_search($answer, $db_answers);
				if($answer_index !== false){
					$score += 1;
				} 

				$total_items += 1;
			}

			$message = "You have finished your quiz (" . $quiz_title . ")\n. You got " . $score . " out of " . $total_items;

			//update student_quizzes table for the score of the student,
			//and submitted_at 

			$student_quiz = StudentQuiz::where('quiz_id', '=', $quiz_id)
				->where('student_id', '=', $id_number)
				->first();	
			$student_quiz->submitted_at = Carbon::now()->toDateTimeString();
			$student_quiz->score = $score;
			$student_quiz->save();

			Session::flush();

			return Redirect::to('/result')
				->with('message', array('type' => 'info', 'text' => $message));
		}

		return Redirect::to('/result')
				->with('message', array('type' => 'danger', 'text' => 'No existing quiz session found.'));


	}


	public function quizResult(){

		$quiz_title = Session::get('quiz_title');
		$this->layout->title = $quiz_title . " Quiz Result";
		$this->layout->content = View::make('quiz_result');
	}

}
