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

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@doLogin');

Route::get('/dashboard', 'AdminController@dashboard');

Route::get('/quiz/new', 'AdminController@newQuiz');
Route::post('/quiz/new', 'AdminController@createQuiz');

Route::get('/quizzes', 'AdminController@quizzes');

Route::get('/quiz/schedule', 'AdminController@newQuizSchedule');
Route::post('/quiz/schedule', 'AdminController@scheduleQuiz');

Route::get('/quiz/{id}', 'AdminController@quiz');

Route::post('/quiz/{id}/update', 'AdminController@updateQuiz');

Route::get('/class/new', 'AdminController@newClass');

Route::post('/class/create', 'AdminController@createClass');

Route::get('/classes', 'AdminController@classes');

Route::get('/class/{id}', 'AdminController@viewClass');

Route::post('/class/{id}/update', 'AdminController@updateClass');

Route::post('/student/drop', 'AdminController@dropStudent');

Route::get('/schedules', 'AdminController@quizSchedules');

Route::get('/tester', function(){

});