<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@doLogin');

Route::post('/meh', function(){

	return 'I commend your effort young padawan.';

});

Route::get('/start-quiz', 'HomeController@startQuiz');
Route::post('/start-quiz', 'HomeController@doStartQuiz');

Route::get('/take-quiz/{id}', 'HomeController@takeQuiz');
Route::post('/submit-quiz', 'HomeController@submitQuiz');

Route::get('/result', 'HomeController@quizResult');

Route::get('/dashboard', 'AdminController@dashboard');

Route::get('/quiz/new', 'AdminController@newQuiz');
Route::post('/quiz/new', 'AdminController@createQuiz');

Route::get('/quizzes', 'AdminController@quizzes');

Route::get('/quiz/schedule', 'AdminController@newQuizSchedule');
Route::post('/quiz/schedule', 'AdminController@scheduleQuiz');

Route::get('/schedules/{id}', 'AdminController@quizSchedule');
Route::post('/quiz/{id}/schedule/update', 'AdminController@updateQuizSchedule');

Route::get('/quiz/{id}', 'AdminController@quiz');

Route::post('/quiz/{id}/update', 'AdminController@updateQuiz');

Route::get('/class/new', 'AdminController@newClass');

Route::post('/class/create', 'AdminController@createClass');

Route::get('/classes', 'AdminController@classes');

Route::get('/class/{id}', 'AdminController@viewClass');

Route::post('/class/{id}/update', 'AdminController@updateClass');

Route::post('/student/drop', 'AdminController@dropStudent');

Route::get('/schedules', 'AdminController@quizSchedules');

Route::get('/finished', 'AdminController@finishedQuizzes');

Route::get('/scores/export/{id}', 'AdminController@exportScores');

Route::get('/scores/{id}', 'AdminController@scores');